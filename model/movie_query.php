<?php
    /**
    * 
    */
    class movie_query 
    {
        var $id;
        var $name ;
        var $link ;
        var $sql_id;
        var $sql_name;
        function __construct($id ,$name){
            $this->id = $id;
            $this->name = $name ;
            $this->link = mysqli_connect('localhost','root','83795381','myphp') ; //connect to database
            $this->sql_id = "select * from movies where id='$this->id' ";
            $this->sql_name = "select * from movies where movieName='$this->name' ";
        }

        function getnamebyid(){
            $result_handle = mysqli_query ($this->link , $this->sql_id);
            $contain = mysqli_fetch_array($result_handle);
            $result = $contain['movieName'];
            return $result;
        }
        function getfare(){
            $result_handle = mysqli_query ($this->link , $this->sql_name);
            $contain = mysqli_fetch_array($result_handle);
            $result = $contain['fare'];
            return $result;
        }
        function gettype(){
            $result_handle = mysqli_query ($this->link , $this->sql_name);
            $contain = mysqli_fetch_array($result_handle);
            $result = $contain['type'];
            return $result;
        }
        function getlasttime(){
            $result_handle = mysqli_query ($this->link , $this->sql_name);
            $contain = mysqli_fetch_array($result_handle);
            $result = $contain['lastTime'];
            return $result;
        }
        function getdirector(){
            $result_handle = mysqli_query ($this->link , $this->sql_name);
            $contain = mysqli_fetch_array($result_handle);
            $result = $contain['director'];
            return $result;
        }
        function getstarring(){
            $result_handle = mysqli_query ($this->link , $this->sql_name);
            $contain = mysqli_fetch_array($result_handle);
            $result = $contain['starring'];
            return $result;
        }
        function getdescription(){
            $result_handle = mysqli_query ($this->link, $this->sql_name);
            $contain = mysqli_fetch_array($result_handle);
            $result = $contain['description'];
            return $result;
        }
        function getpicture(){
            $result_handle = mysqli_query ($this->link , $this->sql_name);
            $contain = mysqli_fetch_array($result_handle);
            $result = $contain['picture'];
            return $result;
        }
        function getlangage(){
            $result_handle = mysqli_query ($this->link , $this->sql_name);
            $contain = mysqli_fetch_array($result_handle);
            $result = $contain['language'];
            return $result;
        }
        function getvideo(){
            $result_handle = mysqli_query ($this->link , $this->sql_name);
            $contain = mysqli_fetch_array($result_handle);
            $result = $contain['video'];
            return $result;
        }
        

    }

?>
