<?php
class user_notFound {
        function pageNotFound($param, $ref) {
                /* URL of RedirectService */
                $redirectServerBaseUrl = 'https://tao.goldbach.com/redirecthandler/';
                
		/* Final 404 Page if no redirect rule exists */
                $error404Url = 'https://www.example.com/index.php?id=4711';

                $originalRequstUri = urlencode($_SERVER['REQUEST_URI']);
                $redirectUrl = $redirectServerBaseUrl . '?r=' . $originalRequstUri;
                $headers = $this->getHeaders($redirectUrl);

                $responseStatus = $headers[0];

                if (strpos($responseStatus, '404 Not Found')) {
                        header($responseStatus);
                        $pageContent = file_get_contents($error404Url);
                        echo $pageContent;
                        exit;
                }

                foreach ($headers as $headerValue) {
                        header($headerValue);
                }

                exit;
        }

        function getHeaders($url) {
                /* API-KEY provided by Goldbach Interactive */
                $apikey = 'YOUR-API-KEY';

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_HEADER, true);
                curl_setopt($ch, CURLOPT_NOBODY, true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, 15);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-gbi-key: " . $apikey));

                $r = curl_exec($ch);

                $r = @split("\n", $r);
                return $r;
        }
}
?>
