<?php
/**
 * Created By: Nilesh Sadarangani <nileshsani@gmail.com>
 * Date: 12/11/14
 */

class scrapeEcommerce {
    protected $_searchString;
    protected $_searchUrl;

    /**
     * Set Search String
     * @param $searchString
     */
    public function setSearchString($searchString) {
        $this->_searchString = $searchString;
    }

    /**
     * Set Search URL
     * @param $seachUrl
     */
    public function setSearchUrl($seachUrl) {
        $this->_searchUrl = $seachUrl;
    }

    /**
     * Get Search String
     * @return mixed
     */
    public function getSearchString() {
        return $this->_searchString;
    }

    /**
     * Get Search URL
     * @return mixed
     */
    public function getSearchUrl() {
        return $this->_searchUrl;
    }

    /**
     * Replace Keyword in Search URL
     * @return bool|mixed
     */
    protected function _replaceKeyword() {
        if (isset($this->_searchUrl)) {
            return str_replace('[search-string]', $this->_searchString, $this->_searchUrl);
        }
        return false;
    }

    /**
     * Return Scraped HTML from the search URL
     * @return mixed
     */
    public function getRawData() {
        if (!empty($this->_searchUrl)) {
            //appending keyword with the search URL
            $searchUrl = $this->_replaceKeyword();

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $searchUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);

            return $data;
        }
        return false;
    }

    /**
     * Do some preg_match, regex to extract images, prices, currency
     * and return to user in JSON array
     * @param $rawHtml
     */
    public function generateReport($rawHtml) {
        /**
         * TODO: preg_match on the HTML resultset
         */
    }
}