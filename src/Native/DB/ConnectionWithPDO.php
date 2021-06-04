<?php
namespace jsalmoralp\RiotAPI\Native\DB;

use PDO;
use PDOException;

class ConnectionWithPDO {
    private String $typeConnection;
    private String $host;
    private String$port;
    private String $db;
    private String $user;
    private String $password;
    private ?PDO $connection;
    private ?Array $query;
    private Bool $isConnected;
    

    public function __construct(
        $typeConnection = "mysql",
        $host = 'localhost',
        $port = "3306",
        $db = "api_riot",
        $user = "root",
        $password = ""
    ) {
        if (
            isset($_ENV['API_RIOT_DB_TYPE_CONNECTION']) &&
            isset($_ENV['API_RIOT_DB_HOST']) &&
            isset($_ENV['API_RIOT_DB_PORT']) &&
            isset($_ENV['API_RIOT_DB_DB']) &&
            isset($_ENV['API_RIOT_DB_USER']) &&
            isset($_ENV['API_RIOT_DB_PASSWORD'])
        ) {
            $this->typeConnection = $_ENV['API_RIOT_DB_TYPE_CONNECTION'];
            $this->host = $_ENV['API_RIOT_DB_HOST'];
            $this->port = $_ENV['API_RIOT_DB_PORT'];
            $this->db = $_ENV['API_RIOT_DB_DB'];
            $this->user = $_ENV['API_RIOT_DB_USER'];
            $this->password = $_ENV['API_RIOT_DB_PASSWORD'];
        } else {
            $this->typeConnection = $typeConnection;
            $this->host = $host;
            $this->port = $port;
            $this->db = $db;
            $this->user = $user;
            $this->password = $password;
        }
        $this->isConnected = false;
    }

    public function connect() {
        $stringOfDataBaseConnection = $this->typeConnection . ":";
        $stringOfDataBaseConnection .= "host=" . $this->host . ":" . $this->port . ";";
        $stringOfDataBaseConnection .= "dbname=" . $this->db;
        try {
            if (!$this->isConnected) {
                $this->connection = new PDO($stringOfDataBaseConnection, $this->user, $this->password);
                $this->isConnected = true;
            }
        } catch (PDOException $ex) {
            //echo $ex;
            unset($this->connection);
            $this->isConnected = false;
        }
    }

    public function close() {
        if ($this->isConnected) {
            unset($this->connection);
            $this->isConnected = false;
        }
    }

    public function clean_query() {
        unset($this->query);
    }

    public function isConnected() : Bool {
        return $this->isConnected;
    }

    public function execute($sql) {
        $this->clean_query();
        if (!$this->isConnected()) {
            $this->connect();
        }
        $query = $this->connection->prepare($sql);
        $query->execute();
        $this->query = $query->fetchAll();
        unset($query);
        $this->close();
    }

    public function get_query() : ?Array {
        return $this->query;
    }
}
