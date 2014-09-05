<?php
    /*
     *  HTTP Status Header Library    2014-9-5
     *  created by aozora0000
     *  homepage  http://blog.aozora0000.biz
     *  github    https://github.com/aozora0000/HeaderGenerator
     */
    namespace Aozora0000\HeaderGenerator;
    class Header {
        /*
         * set populer status codes
         * @param integer $code
         */
        public static function setStatus($code) {
            switch($code) {
                case 200:
                    header("HTTP/1.1 200 OK");break;
                case 203:
                    header("HTTP/1.1 203 Non-Authoritative Information");break;
                case 204:
                    header("HTTP/1.1 204 No Content");break;
                case 400:
                    header("HTTP/1.1 400 Bad Request");break;
                case 403:
                    header("HTTP/1.1 403 Forbidden");break;
                case 404:
                    header("HTTP/1.1 404 Not Found");break;
                case 405:
                    header("HTTP/1.1 405 Method Not Allowed");break;
                case 406:
                    header("HTTP/1.1 406 Not Acceptable");break;
                case 503:
                    header("HTTP/1.1 503 Service Unavailable");break;
            }
        }
        /*
         * set redirect code
         * @param integer $code
         * @param string  $url
         */
        public static function redirect($code,$url = false) {
            if($url) {
                switch($code) {
                    case 307:
                        header("HTTP/1.1 307 Temporary Redirect");
                        header("Location: $url");exit;
                    case 308:
                        header("HTTP/1.1 308 Permanent Redirect");
                        header("Location: $url");exit;
                }
            }
        }
        /*
         * set content-type code
         * @param string   $extention
         * @param integer  $filesize
         * @param string   $filename
         */
        public static function setContentType($extention,$filesize = false,$filename = false) {
            switch($extention) {
                /*
                 *  TextContentTypes
                 */
                case "htm":
                case "html":
                    header("Content-type: text/html; charset=UTF-8");break;
                case "txt":
                case "text":
                    header("Content-type: text/plain; charset=UTF-8");break;
                case "css":
                    header("Content-type: text/css; charset=UTF-8");break;
                case "js":
                case "javascript":
                    header("Content-type: application/x-javascript; charset=UTF-8");break;
                case "json":
                    header("Content-Type: application/json; charset=utf-8");break;
                case "x-json":
                    header('Access-Control-Allow-Origin: *');
                    header("Access-Control-Allow-Methods: POST, GET");
                    header("Access-Control-Allow-Headers: x-requested-with");
                    header("Content-Type: application/json; charset=utf-8");break;
                case "csv":
                    header("Content-Type:  text/csv; charset=utf-8");break;
                case "tsv":
                    header("Content-Type:  text/tab-separated-values; charset=utf-8");break;

                /*
                 *  ImageContentTypes
                 */
                case "jpg":
                case "jpeg":
                    header("Content-type: image/jpeg");break;
                case "gif":
                    header("Content-type: image/gif");break;
                case "png":
                    header("Content-type: image/png");break;

                /*
                 *  CompressedDataContentTypes
                 */
                case "zip":
                    header("Content-type: application/zip");break;
                case "lzh":
                    header("Content-type: application/x-lzh");break;
                case "tar":
                case "gzip":
                    header("Content-type: application/x-tar");break;

                /*
                 *  MediaContentTypes
                 */
                case "mp3":
                    header("Content-type: audio/mpeg");break;
                case "m4a":
                    header("Content-type: audio/mp4");break;
                case "wav":
                    header("Content-type: audio/x-wav");break;
                case "mid":
                    header("Content-type: audio/midi");break;
                case "mpg":
                    header("Content-type: video/mpeg");break;
                case "wmv":
                    header("Content-type: video/x-ms-wmv");break;
                case "flv":
                    header("Content-type: application/x-shockwave-flash");break;
                case "3GPP2":
                    header("Content-type: video/3gpp2");break;

                /*
                 *  notMatchTypes
                 */
                default:
                    header("Content-type: application/octet-stream");break;
            }
            if($filesize) {
                header("Content-length: {$filesize}");
            }
            if($filename) {
                header('Content-Disposition: attachment; filename="'.$filename.'"');
            }
        }
    }
