<?php
namespace jsalmoralp\RiotAPI\Native\Request;

class RequestToAPI {
    private String $json;
    private Mixed $obj;
    private String $infoRequest;

    public function getObject_fromJsonUrl(String $url) : Mixed {
        $this->json = @file_get_contents($url);
        if (strpos($http_response_header[0], "200")) {
            $this->obj = json_decode($this->json);
            $infoString = "\n--- 200 (Good Request) ---\n";
            $infoString .= "- For 200 response codes, you can always expect the response body documented on the API reference page. Only 200 response codes are guaranteed to return a response body as JSON.\n";
            $infoString .= "- A response body is not guaranteed to be returned.\n";
            $infoString .= "- If there is a response body, its not guaranteed to be JSON.\n";
            $infoString .= "- We currently return JSON with human readable debugging information, but the structure and content of this debugging information are subject to change.\n";
            $infoString .= "-------------------------\n";
            $this->infoRequest = $infoString;
            if (isset($this->obj->status->status_code)) {
                $this->infoRequest .= "=== FINALY STATUS CODE -> " . $this->obj->status->status_code . " ===";
                $this->infoRequest .= "=== FINALY STATUS MESSAGE -> " . $this->obj->status->message . " ===";
                return $this->infoRequest;
            } elseif (isset($this->obj)) {
                return $this->obj;
            } else {
                $this->infoRequest .= "=== JsonDecode don't work ===";
                return $this->infoRequest;
            }
        } elseif (strpos($http_response_header[0], "400")) {
            $this->obj = json_decode($this->json);
            $infoString = "\n--- 400 (Bad Request) ---\n";
            $infoString .= "This error indicates that there is a syntax error in the request and the request has therefore been denied. The client should not continue to make similar requests without modifying the syntax or the requests being made.\n";
            $infoString .= "\nCommon Reasons:\n";
            $infoString .= "- A provided parameter is in the wrong format (e.g., a string instead of an integer).\n";
            $infoString .= "- A provided parameter is invalid (e.g., beginTime and startTime specify a time range that is too large).\n";
            $infoString .= "- A required parameter was not provided.\n";
            $infoString .= "-------------------------\n";
            $this->infoRequest = $infoString;
            return $this->infoRequest;
        } elseif (strpos($http_response_header[0], "401")) {
            $this->obj = json_decode($this->json);
            $infoString = "\n--- 401 (Unauthorized) ---\n";
            $infoString .= "This error indicates that the request being made did not contain the necessary authentication credentials (e.g., an API key) and therefore the client was denied access. The client should not continue to make similar requests without including an API key in the request.\n";
            $infoString .= "\nCommon Reasons:\n";
            $infoString .= "- An API key has not been included in the request.\n";
            $infoString .= "-------------------------\n";
            $this->infoRequest = $infoString;
            return $this->infoRequest;
        } elseif (strpos($http_response_header[0], "403")) {
            $this->obj = json_decode($this->json);
            $infoString = "\n--- 403 (Forbidden) ---\n";
            $infoString .= "This error indicates that the server understood the request but refuses to authorize it. There is no distinction made between an invalid path or invalid authorization credentials (e.g., an API key). The client should not continue to make similar requests.\n";
            $infoString .= "\nCommon Reasons:\n";
            $infoString .= "- An invalid API key was provided with the API request.\n";
            $infoString .= "- A blacklisted API key was provided with the API request.\n";
            $infoString .= "- The API request was for an incorrect or unsupported path.\n";
            $infoString .= "-------------------------\n";
            $this->infoRequest = $infoString;
            return $this->infoRequest;
        } elseif (strpos($http_response_header[0], "404")) {
            $this->obj = json_decode($this->json);
            $infoString = "\n--- 404 (Data not found) ---\n";
            $infoString .= "This error indicates that the server has not found a match for the API request being made. No indication is given whether the condition is temporary or permanent.\n";
            $infoString .= "\nCommon Reasons:\n";
            $infoString .= "- The ID or name provided does not match any existing resource (e.g., there is no Summoner matching the specified ID).\n";
            $infoString .= "- There are no resources that match the parameters specified.\n";
            $infoString .= "-------------------------\n";
            $this->infoRequest = $infoString;
            return $this->infoRequest;
        } elseif (strpos($http_response_header[0], "405")) {
            $this->obj = json_decode($this->json);
            $infoString = "\n--- 405 (Method not allowed) ---\n";
            $infoString .= "Undocumented\n"; //TODO: Implement more info.
            $infoString .= "-------------------------\n";
            $this->infoRequest = $infoString;
            return $this->infoRequest;
        } elseif (strpos($http_response_header[0], "415")) {
            $this->obj = json_decode($this->json);
            $infoString = "\n--- 415 (Unsupported Media Type) ---\n";
            $infoString .= "This error indicates that the server is refusing to service the request because the body of the request is in a format that is not supported.\n";
            $infoString .= "\nCommon Reasons:\n";
            $infoString .= "- The Content-Type header was not appropriately set.\n";
            $infoString .= "-------------------------\n";
            $this->infoRequest = $infoString;
            return $this->infoRequest;
        } elseif (strpos($http_response_header[0], "429")) {
            $this->obj = json_decode($this->json);
            $infoString = "\n--- 429 (Rate Limit Exceeded) ---\n";
            $infoString .= "This error indicates that the application has exhausted its maximum number of allotted API calls allowed for a given duration. If the client receives a Rate Limit Exceeded response the client should process this response and halt future API calls for the duration, in seconds, indicated by the Retry-After header. Applications that are in violation of this policy may have their access disabled to preserve the integrity of the API. Please refer to our Rate Limiting documentation below for more information on determining if you have been rate limited, and how to avoid it.\n";
            $infoString .= "\nCommon Reasons:\n";
            $infoString .= "- Unregulated API calls.\n";
            $infoString .= "-------------------------\n";
            $this->infoRequest = $infoString;
            return $this->infoRequest;
        } elseif (strpos($http_response_header[0], "500")) {
            $this->obj = json_decode($this->json);
            $infoString = "\n--- 500 (Internal Server Error) ---\n";
            $infoString .= "This error indicates an unexpected condition or exception which prevented the server from fulfilling an API request.\n";
            $infoString .= "-------------------------\n";
            $this->infoRequest = $infoString;
            return $this->infoRequest;
        } elseif (strpos($http_response_header[0], "502")) {
            $this->obj = json_decode($this->json);
            $infoString = "\n--- 502 (Bad gateway) ---\n";
            $infoString .= "Undocumented\n"; //TODO: Implement more info.
            $infoString .= "-------------------------\n";
            $this->infoRequest = $infoString;
            return $this->infoRequest;
        } elseif (strpos($http_response_header[0], "503")) {
            $this->obj = json_decode($this->json);
            $infoString = "\n--- 503 (Service Unavailable) ---\n";
            $infoString .= "This error indicates the server is currently unavailable to handle requests because of an unknown reason. The Service Unavailable response implies a temporary condition which will be alleviated after some delay.\n";
            $infoString .= "-------------------------\n";
            $this->infoRequest = $infoString;
            return $this->infoRequest;
        } elseif (strpos($http_response_header[0], "504")) {
            $this->obj = json_decode($this->json);
            $infoString = "\n--- 504 (Gateway timeout) ---\n";
            $infoString .= "Undocumented\n"; //TODO: Implement more info.
            $infoString .= "-------------------------\n";
            $this->infoRequest = $infoString;
            return $this->infoRequest;
        } else {
            $error = error_get_last();
            $infoString = "\n--- Error en la peticion! ---\n";
            $infoString .= $error['message'] . "\n";
            $infoString .= "-------------------------\n";
            $this->infoRequest = $infoString;
            return $this->infoRequest;
        }
    }
}
