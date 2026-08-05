<?php


class model_portfolio extends Model
{

    function __construct()
    {
        parent::__construct();
    }

//    futureeeee
    public function saveSortOrder($items)
    {

        $this->db->beginTransaction();

        try{

            foreach($items as $item){

                $stmt=$this->db->prepare(

                    "UPDATE portfolios
                 SET sort_order=?
                 WHERE id=?"
                );

                $stmt->execute([

                    $item["order"],

                    $item["id"]

                ]);

            }

            $this->db->commit();

        }catch(Exception $e){

            $this->db->rollBack();

            throw $e;

        }

    }

}
