<?php

class order{
     
    private $order_id;
    private $date;
    private $download_count;
    

    /**
     * Get the value of order_id
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * Set the value of order_id
     *
     * @return  self
     */
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;

        return $this;
    }

    /**
     * Get the value of date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of download_count
     */
    public function getDownloadCount()
    {
        return $this->download_count;
    }

    /**
     * Set the value of download_count
     *
     * @return  self
     */
    public function setDownloadCount($download_count)
    {
        $this->download_count = $download_count;

        return $this;
    }
}