<?php

class product{

    private $product_id;
    private $product_name;
    private $download_file_link;
    public function __construct($product_id , $product_name,$download_file_link) {
        $this->setOrderId($product_id);
        $this->setDate($product_name);
        $this->setDownloadCount($download_file_link);
    }
    

   

    /**
     * Get the value of product_id
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * Set the value of product_id
     *
     * @return  self
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;

        return $this;
    }

    /**
     * Get the value of product_name
     */
    public function getProductName()
    {
        return $this->product_name;
    }

    /**
     * Set the value of product_name
     *
     * @return  self
     */
    public function setProductName($product_name)
    {
        $this->product_name = $product_name;

        return $this;
    }

    /**
     * Get the value of download_file_link
     */
    public function getDownloadFileLink()
    {
        return $this->download_file_link;
    }

    /**
     * Set the value of download_file_link
     *
     * @return  self
     */
    public function setDownloadFileLink($download_file_link)
    {
        $this->download_file_link = $download_file_link;

        return $this;
    }
}