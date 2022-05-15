<?php

class HelperFormValidation
{

    public array $errors = [];

    public function required($data,string $filedName)
    {
        if(empty($data)) {
            $this->errors[] ="This fields $filedName is required";
        }

        return $this;
    }

    public function url(string $url)
    {
        if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
            $this->errors[] ="Invalid URL";
        }

        return $this;
    }

    public function date(string $date)
    {
        if(!strtotime($date)) {
            $this->errors[] ="Invalid date";
        }

        return $this;
    }

    public function dateAfter(string $from, string $to)
    {
        if(date_create($from) > date_create($to)) {
            $this->errors[] ="Invalid date between ! that should $to grater thant $from";
        }

        return $this;
    }


}