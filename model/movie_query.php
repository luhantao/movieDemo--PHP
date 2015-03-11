<?php
    /**
    * 前端首页，加载电影海报信息时调用
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

    /**
    * 前端购票弹窗，ajax查询电影日期/时间段/座位表时调用
    */
    class ticket_query 
    {
        var $name ;
        var $date ;
        var $time ;
        var $link ;
        function __construct($name , $date , $time){
            $this->name = $name ;
            $this->date = $date;
            $this->time = $time;
            $this->link = mysqli_connect('localhost','root','83795381','myphp') ; //connect to database
        }

        function gettime(){
            $sql = "select * from movie_day" ."$this->date". " where name='$this->name' ";     
            $result_handle = mysqli_query($this->link , $sql);
            $contain = mysqli_fetch_array($result_handle);
            $result[0] = $contain['time1'] ;
            $result[1] = $contain['time2'] ;
            $result[2] = $contain['time3'] ;
            return $result;
        }

        function getseats(){
        //数据表的数据项名称不能为index！！！使用保留名称会出错的，用tag代替。
            $sql_index = "SELECT * from association_table where name='$this->name' 
                 and date='$this->date' and time='$this->time' ";     
            $result_handle = mysqli_query($this->link , $sql_index);
            $contain = mysqli_fetch_array($result_handle);
            $tag = $contain['tag'];

            $sql_seats = "SELECT * from seats where tag='$tag' ";
            $result_handle2 = mysqli_query($this->link , $sql_seats);
            $contain2= mysqli_fetch_array($result_handle2);

            return $contain2;
        }

    }

    /**
    * 购票成功，往数据库插入记录时用到。
    */
    class buy_ticket  
    {
        var $user_name;
        var $movie_name;
        var $date;
        var $time;
        var $seat;
        var $link;
        function __construct($user_name , $movie_name , 
            $date , $time ,$seat)
        {
            $this->user_name = $user_name;
            $this->movie_name = $movie_name;
            $this->date = $date;
            $this->time = $time;
            $this->seat = $seat;
            $this->link = mysqli_connect('localhost','root','83795381','myphp') ; 
        }

        function insert_record(){
            $sql_insert = "insert into tickets_sold(user_name , movie_name , date , time , seat) 
                            values('$this->user_name' , '$this->movie_name' , '$this->date' , 
                            '$this->time' , '$this->seat')" ;
            $result_handle = mysqli_query($this->link , $sql_insert);
            if ($result_handle){
                $result = $this->seat_change("insert");
                return $result;
            }
            else{
                return "failed";
            }
        }

        function delete_record(){
            $sql_delete = "delete from tickets_sold where user_name='$this->user_name' and movie_name='$this->movie_name' 
                                and date='$this->date' and time='$this->time' and seat='$this->seat'";
            $result_handle = mysqli_query($this->link , $sql_delete);
            if ($result_handle){
                $result = $this->seat_change("delete");
                return $result;
            }
            else{
                return "first_step_failed";
            }
        }

        function seat_change($type){
            $sql_index = "select tag from association_table where name='$this->movie_name' 
                 and date='$this->date' and time='$this->time' ";     

            $result_handle = mysqli_query($this->link , $sql_index);
            $contain = mysqli_fetch_array($result_handle);
            $tag = $contain['tag'];

            if ($type =="insert"){  //  yes->no
                $sql_seats = "update seats set seats" .$this->seat. "='no' where tag='$tag' ";
            }
            else{       //$type="delete"  no->yes
                $sql_seats = "update seats set seats" .$this->seat. "='yes' where tag='$tag' ";
            }
            $result_handle2 = mysqli_query($this->link , $sql_seats);
            if ($result_handle2){
                return "succeed";
            }
            else{
                return "step_two_failed";
            }
        }

    }

    /**
    * 查询已售出的电影票
    */
    class tickets_sold_query
    {
        var $link;
        var $user_name;
        function __construct($user_name)
        {
            $this->user_name = $user_name;
            $this->link = mysqli_connect('localhost','root','83795381','myphp') ; 
        }

        function query(){
            $sql = "select * from tickets_sold where user_name ='$this->user_name' ";     
            $result_handle = mysqli_query($this->link , $sql);
            //$contain = mysqli_fetch_array($result_handle);
            while( $row = mysqli_fetch_array($result_handle)) {
                $data[]=$row;
            }
            return $data;
        }
    }


?>
