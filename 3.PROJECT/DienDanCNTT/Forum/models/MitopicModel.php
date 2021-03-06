<?php
    require_once("model.php");


    class MitopicModel{
        private $mitopic_id;
        private $title;
        private $description;
        private $topic_id;
        public $connection;
        const TABLE="mitopics";
        
        function MitopicModel($title='',$description='',$topic_id=''){
            $this->title=$title;
            $this->description=$description;
            $this->topic_id=$topic_id;
            $this->connection=openConnect();
            if(!$this->connection)
            die("khong ket loi dc");
            
        }

        function create(){
            $sql="INSERT INTO ". self::TABLE . " SET title='$this->title' ,description='$this->description', topic_id='$this->topic_id'";
            $rs=mysqli_query($this->connection,$sql);
            // echo $sql;
            closeConnect($this->connection);
            return 1;
        }

        function update($mtp_id){
            $sql="UPDATE ". self::TABLE . " SET title='$this->title' ,description='$this->description'";
            $sql=$sql." WHERE mitopic_id=".$mtp_id;
            mysqli_query($this->connection,$sql);
            closeConnect($this->connection);
            return 1;
        }

        function selectAll($data=[]){
            $sql="SELECT * FROM ". self::TABLE;
            $i=0;
            foreach($data as $key=>$value){
                if($i==0){
                    $sql=$sql." WHERE $key=$value";
                }
                else{
                    $sql=$sql." AND $key=$value";
                }
                $i++;
            }
            $rs=mysqli_query($this->connection,$sql);
            $result=mysqli_fetch_all($rs,MYSQLI_ASSOC);
            closeConnect($this->connection);
            return $result;
            // chưa xử lý có đk
        }

        function getNamebyId($mtp_id){
            $sql="SELECT title,status FROM ". self::TABLE ." WHERE mitopic_id='$mtp_id'";
            $rs=mysqli_query($this->connection,$sql);
            $result=mysqli_fetch_assoc($rs);
            closeConnect($this->connection);
            return $result;
        }
        
        // lay thang mi topic theo id;
        function getOne($mtp_id){
            $sql="SELECT * FROM ". self::TABLE . " WHERE mitopic_id='$mtp_id' LIMIT 1";
            $rs=mysqli_query($this->connection,$sql);
            $result=mysqli_fetch_assoc($rs);
            closeConnect($this->connection);
            return $result;
            // chưa xử lý có đk
        }

        function delete($mtp_id){
            $sql="DELETE FROM ". self::TABLE . " WHERE mitopic_id='$mtp_id'";
            $rs=mysqli_query($this->connection,$sql);
            closeConnect($this->connection);
            return 1;
        }

        function close($mtp_id){
            $sql = "UPDATE ". self::TABLE . " SET status='0'";
            $sql=$sql." WHERE mitopic_id=".$mtp_id;
            mysqli_query($this->connection,$sql);
            closeConnect($this->connection);
            return 1;
        }

        function open($mtp_id){
            $sql = "UPDATE ". self::TABLE . " SET status='1'";
            $sql=$sql." WHERE mitopic_id=".$mtp_id;
            mysqli_query($this->connection,$sql);
            closeConnect($this->connection);
            return 1;
        }
    }

    // $tp=new TopicModel();
    // $rs=$tp->selectAll(['zone_id'=>1]);
    // print_r($rs);


?>