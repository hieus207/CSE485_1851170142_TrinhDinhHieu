<?php
    require_once("model.php");


    class PostModel{
        private $post_id;
        private $title;
        private $create_at;
        private $body;
        private $tags;
        private $status;
        private $user_id;
        private $topic_id;
        private $mitopic_id; 
        public $connection;
        const TABLE="posts";
        
        function PostModel(){
            $this->connection=openConnect();
            if(!$this->connection)
            die("khong ket loi dc");
            
        }

        function getPostInTP($tp_id){
            $sql="SELECT p.*,u.username,u.user_id FROM posts As p JOIN users as u ON p.user_id=u.user_id WHERE p.topic_id='$tp_id'";
            $rs=mysqli_query($this->connection,$sql);
            $result=mysqli_fetch_all($rs,MYSQLI_ASSOC);
            closeConnect($this->connection);
            return $result;
        }

        function getPostInMTP($mtp_id){
            $sql="SELECT p.*,u.username,u.user_id FROM posts As p JOIN users as u ON p.user_id=u.user_id WHERE p.mitopic_id='$mtp_id'";
            $rs=mysqli_query($this->connection,$sql);
            $result=mysqli_fetch_all($rs,MYSQLI_ASSOC);
            closeConnect($this->connection);
            return $result;
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
        
        function selectOne($id){
            $sql="SELECT * FROM ". self::TABLE . " WHERE post_id='$id' LIMIT 1";

            $rs=mysqli_query($this->connection,$sql);
            $result=mysqli_fetch_assoc($rs);
            closeConnect($this->connection);
            return $result;
            // chưa xử lý có đk
        }
        
    }

    // $tp=new PostModel();
    // $rs=$tp->selectOne(3);
    // print_r($rs);



?>