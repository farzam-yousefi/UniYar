<?php
require_once __DIR__ . '/../core/const.php';

class model_dashboard extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getAllReports()
    {
        $sql = "select fullName,trackingCode,topic,description,locationMapLink,status
          , reportId,submissionTimeStamp from  report_tbl r ,user_tbl u 
           where  u.userId=r.userId order by submissionTimeStamp desc";
        return $this->myFetchAll($sql);
    }
    function updateStatus($reportId, $status,$adminId){
        $resolvedAt = date("Y-m-d H:i:s");
        $sql="update report_tbl set status=? ,adminId=? ,resolvationTimeStamp=? where reportId=?";
        $this->doQuery($sql,[$status,$adminId,$resolvedAt ,$reportId]);
    }

    function GetFilteredReports($get){
        if($get['reportFilter']=="notDone") {
            $sql = "select fullName,trackingCode,topic,description,locationMapLink,status
          , reportId, submissionTimeStamp from  report_tbl r ,user_tbl u  where  u.userId=r.userId 
          and status!=? order by submissionTimeStamp desc";
            return $this->myFetchAll($sql, [DONE]);
        }
        else
            $sql = "select fullName,trackingCode,topic,description,locationMapLink,status
          , reportId,submissionTimeStamp from  report_tbl r ,user_tbl u  
          where  u.userId=r.userId order by submissionTimeStamp desc";
        return $this->myFetchAll($sql);
    }
}
