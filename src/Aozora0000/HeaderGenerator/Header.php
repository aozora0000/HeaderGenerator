<?php
    /*
     *  HTTP Status Header Library    2014-9-5
     *  created by aozora0000
     *  homepage  http://blog.aozora0000.biz
     *  github    https://github.com/aozora0000/HeaderGenerator
     */
    namespace Aozora0000\HeaderGenerator;
    class Header {
        // STATUSCODE
        const CODE200 = "HTTP/1.1 200 OK";
        const CODE203 = "HTTP/1.1 203 Non-Authoritative Information";
        const CODE204 = "HTTP/1.1 204 No Content";
        const CODE400 = "HTTP/1.1 400 Bad Request";
        const CODE403 = "HTTP/1.1 403 Forbidden";
        const CODE404 = "HTTP/1.1 404 Not Found";
        const CODE405 = "HTTP/1.1 405 Method Not Allowed";
        const CODE406 = "HTTP/1.1 406 Not Acceptable";
        const CODE503 = "HTTP/1.1 503 Service Unavailable";
        // REDIRECT STATUS CODE
        const CODE301 = "HTTP/1.1 308 Permanent Redirect";
        const CODE302 = "HTTP/1.1 307 Temporary Redirect";
        const CODE307 = "HTTP/1.1 307 Temporary Redirect";
        const CODE308 = "HTTP/1.1 308 Permanent Redirect";

        const TYPEHTM = "Content-type: text/html; charset=UTF-8";
        const TYPETXT = "Content-type: text/plain; charset=UTF-8";
        const TYPECSS = "Content-type: text/css; charset=UTF-8";
        const TYPEJS  = "Content-type: application/x-javascript; charset=UTF-8";
        const TYPEJSON= "Content-Type: application/json; charset=utf-8";
        const TYPECSV = "Content-Type:  text/csv; charset=utf-8";
        const TYPETSV = "Content-Type:  text/tab-separated-values; charset=utf-8";
        const TYPEJPG = "Content-type: image/jpeg";
        const TYPEGIF = "Content-type: image/gif";
        const TYPEPNG = "Content-type: image/png";
        const TYPEZIP = "Content-type: application/zip";
        const TYPELZH = "Content-type: application/x-lzh";
        const TYPETAR = "Content-type: application/x-tar";
        const TYPEMP3 = "Content-type: audio/mpeg";
        const TYPEM4A = "Content-type: audio/mp4";
        const TYPEWAV = "Content-type: audio/x-wav";
        const TYPEMID = "Content-type: audio/midi";
        const TYPEWMV = "Content-type: video/x-ms-wmv";
        const TYPEMPG = "Content-type: video/mpeg";
        const TYPEFLV = "Content-type: application/x-shockwave-flash";
        const TYPEGPP2= "Content-type: video/3gpp2";
        const TYPEBIN = "Content-type: application/octet-stream";

        /*
         * set populer status codes
         * @param integer $code
         */
        public static function setStatus($code) {
            switch($code) {
                case 200:
                    header(self::CODE200);
                    return self::CODE200;break;
                case 203:
                    header(self::CODE203);
                    return self::CODE203;break;
                case 204:
                    header(self::CODE204);
                    return self::CODE204;break;
                case 400:
                    header(self::CODE400);
                    return self::CODE400;break;
                case 403:
                    header(self::CODE403);
                    return self::CODE403;break;
                case 404:
                    header(self::CODE404);
                    return self::CODE404;break;
                case 405:
                    header(self::CODE405);
                    return self::CODE405;break;
                case 406:
                    header(self::CODE406);
                    return self::CODE406;break;
                case 503:
                    header(self::CODE503);
                    return self::CODE503;break;
                default:
                    throw new Exception("STATUS CODE NOT FOUND");
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
                    case 302:
                    case 307:
                        header(self::CODE307);
                        header("Location: $url");
                        return ["code"=>self::CODE307,"url"=>$url];exit;
                    case 301:
                    case 308:
                        header(self::CODE308);
                        header("Location: $url");
                        return ["code"=>self::CODE308,"url"=>$url];exit;
                }
            } else {
                throw new Exeption("Not Set Redirect URL");
            }
        }
        /*
         * set content-type code
         * @param string   $extention
         * @param integer  $filesize
         * @param string   $filename
         * @param boolean  $access
         */
        public static function setContentType($extention,$filesize = false,$filename = false,$access = false) {
            if($filesize) {
                if(is_int($filesize)) {
                    header("Content-length: {$filesize}");
                } else {
                    throw new Exception("CONTENT LENGTH INTEGER ONLY");
                }
            }
            if(is_string($filename)) {
                header('Content-Disposition: attachment; filename="'.$filename.'"');
            }
            if($accsess) {
                header('Access-Control-Allow-Origin: *');
                header("Access-Control-Allow-Methods: POST, GET");
                header("Access-Control-Allow-Headers: x-requested-with");
            }

            switch($extention) {
                /*
                 *  TextContentTypes
                 */
                case "htm":
                case "html":
                    header(self::TYPEHTM);
                    return self::TYPEHTM;break;
                case "txt":
                case "text":
                    header(self::TYPETXT);
                    return self::TYPETXT;break;
                case "css":
                    header(self::TYPECSS);
                    return self::TYPECSS;break;
                case "js":
                case "javascript":
                    header(self::TYPEJS);
                    return self::TYPEJS;break;
                case "json":
                    header(self::TYPEJSON);
                    return self::TYPEJSON;break;
                case "x-json":
                    header(self::TYPEJSON);
                    return self::TYPEJSON;break;
                case "csv":
                    header(self::TYPECSV);
                    return self::TYPECSV;break;
                case "tsv":
                    header(self::TYPETSV);
                    return self::TYPETSV;break;

                /*
                 *  ImageContentTypes
                 */
                case "jpg":
                case "jpeg":
                    header(self::TYPEJPG);
                    return self::TYPEJPG;break;
                case "gif":
                    header(self::TYPEGIF);
                    return self::TYPEGIF;break;
                case "png":
                    header(self::TYPEPNG);
                    return self::TYPEPNG;break;

                /*
                 *  CompressedDataContentTypes
                 */
                case "zip":
                    header(self::TYPEZIP);
                    return self::TYPEZIP;break;
                case "lzh":
                    header(self::TYPELZH);
                    return self::TYPELZH;break;
                case "tar":
                case "gzip":
                    header(self::TYPETAR);
                    return self::TYPETAR;break;

                /*
                 *  MediaContentTypes
                 */
                case "mp3":
                    header(self::TYPEMP3);
                    return self::TYPEMP3;break;
                case "m4a":
                    header(self::TYPEM4A);
                    return self::TYPEM4A;break;
                case "wav":
                    header(self::TYPEWAV);
                    return self::TYPEWAV;break;
                case "mid":
                    header(self::TYPEMID);
                    return self::TYPEMID;break;
                case "mpg":
                    header(self::TYPEMPG);
                    return self::TYPEMPG;break;
                case "wmv":
                    header(self::TYPEWMV);
                    return self::TYPEWMV;break;
                case "flv":
                    header(self::TYPEFLV);
                    return self::TYPEFLV;break;
                case "3GPP2":
                    header(self::TYPEGPP2);
                    return self::TYPEGPP2;break;

                /*
                 *  notMatchTypes
                 */
                default:
                    header(self::TYPEBIN);
                    return self::TYPEBIN;break;
            }
        }
    }
