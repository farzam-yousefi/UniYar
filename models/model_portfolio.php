<?php


class model_portfolio extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    /* ======================
  ADMIN OPERATIONS
   ====================== */
    function getAllPortfolios($orderBy = "started_date", $mode = "desc")
    {
        $sql = "select * from projects order by $orderBy $mode";
        return $this->myFetchAll($sql);

    }

    function getStatics()
    {
        $sqlTotalCount = "select count(id) as totalCount from projects";
        $sqlCompletedCount = "select count(*) as completedCount from projects where status='COMPLETED' ";
        $sqlActiveCount = "select count(*) as activeCount from projects where is_active=1";
        $sqlFeaturedCount = "select count(*) as featuredCount from projects where is_featured=1";
        $sqlWebsiteCount = "select count(*) as websiteCount from projects where category='WEBSITE'";
        $sqlDatabaseCount = "select count(*) as databaseCount from projects where category='DATABASE'";
        $sqlProgrammingCount = "select count(*) as programmingCount from projects where category='PROGRAMMING'";
        return [$this->myFetch($sqlTotalCount),
            $this->myFetch($sqlCompletedCount),
            $this->myFetch($sqlActiveCount),
            $this->myFetch($sqlFeaturedCount),
            $this->myFetch($sqlWebsiteCount),
            $this->myFetch($sqlDatabaseCount),
            $this->myFetch($sqlProgrammingCount)];
    }

    function getPortfolios($status)
    {
        if ($status === "ALL")
            $res = $this->getAllPortfolios()[0];

        else {
            if ($status === "active" || $status === "featured") {
                $column="is_".$status;
                $sql= "select * from projects where $column=1 order by started_date desc";
                $res = $this->myFetchAll($sql);

            } else {
                $sql = "select * from projects where status=? order by started_date desc";
                $res = $this->myFetchAll($sql, [$status]);
            }
        }
////            $json = json_encode($res);
////       print_r($res);
        return $res;

    }

    function getVisiblePortfoliosForSort($mode='active'){
        $column="is_".$mode;
        $sql= "select id,title,category,status,is_featured from projects where $column=1 order by display_order";
         return $this->myFetchAll($sql);
    }

    function changeBeingActiveFeatured($post, $id)
    {
        $column = ($post['field'] == "is_active") ? "is_active" : "is_featured";
        if ($column === "is_featured" && (int)($post['value'] === 0))
            $post['tags'] = null;
        $sql = "update projects set $column = ? , tags=? where id=?";
        $this->doQuery($sql, [$post['value'], $post['tags'], $id]);
    }

    function delete($id)
    {
        $sql = "delete from projects where id=?";
        $this->doQuery($sql, [$id]);
    }

    function addFromAdmin($post, $imgName, $adminId)
    {
        try {

            $sql = "insert into projects(service_id,title,slug,short_description,description,
           cover_image,github_url,is_featured,tags , is_active ,display_order,duration,level, category,
           handled_by_admin_id,started_date,completed_date,status) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ";

            $sql0 = "select COALESCE(MAX(display_order), 0) + 1 as display_order from projects";

            $display_order = $this->myFetch($sql0)['display_order'];
            $slug = Helper::removeSpecialCharacter($post['title']);
            $start = new DateTime($post['started_date']);
            $end = new DateTime($post['completed_date']);
            $duration = $start->diff($end)->days + 1;
            $this->doQuery($sql, [1, $post['title'], $slug, $post['short_description'],
                $post['description'], $imgName, $post['project_url'], $post['is_featured'] ?? 0,
                $post['tags'],
                $post['is_active'] ?? 0, $display_order, $duration, $post['level'], $post['category']
                , $adminId, $post['started_date'], $post['completed_date'], $post['status']]);
            return true;
        } catch (PDOException $e) {

            // ثبت خطا برای خودم
            error_log($e->getMessage());

            // پیام مناسب برای کاربر
            return false;

        } catch (Exception $e) {

            error_log($e->getMessage());

            return false;
        }

    }


    public function saveSortOrder($items)
    {

        self::$conn->beginTransaction();

        try {

            foreach ($items as $item) {

                $sql = "UPDATE projects SET display_order=?  WHERE id=?";
                $this->doQuery($sql, [$item['order'], $item['id']]);
            }

            self::$conn->commit();

        } catch (Exception $e) {

            if (self::$conn->inTransaction()) {
                self::$conn->rollBack();
            }

            throw $e;

        }

    }

    function getPortfolioById($id)
    {
        $sql = "select * from projects where id=?";
        return $this->myFetch($sql, [$id]);
    }

    function editFromAdmin($post, $imgName, $adminId, $id)
    {
        try {

            $sql = "update projects set title=? ,slug=? ,short_description=? ,description=?,
cover_image=?,github_url=?,is_featured=? , tags=?, is_active=? ,duration=? ,level=? , category=?,
handled_by_admin_id=?,started_date=?,completed_date=? ,status=? where id=? ";


            $slug = Helper::removeSpecialCharacter($post['title']);
            $start = new DateTime($post['started_date']);
            $end = new DateTime($post['completed_date']);
            $duration = $start->diff($end)->days + 1;
            $this->doQuery($sql, [$post['title'], $slug, $post['short_description'],
                $post['description'], $imgName, $post['project_url'], $post['is_featured'],
                $post['tags'], $post['is_active'], $duration, $post['level'], $post['category']
                , $adminId, $post['started_date'], $post['completed_date'], $post['status'], $id]);
            return true;
        } catch (PDOException $e) {

            // ثبت خطا برای خودم
            error_log($e->getMessage());

            // پیام مناسب برای کاربر
            return false;

        } catch (Exception $e) {

            error_log($e->getMessage());

            return false;
        }
    }

    /* ======================
 WEBSITE OPERATIONS
  ====================== */

    function getActivePortfolios()
    {
        $sql = "select title , short_description , duration , level , category,
        cover_image from projects where is_active=1 order by display_order";
        return $this->myFetchAll($sql);
    }
}
