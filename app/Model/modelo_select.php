<?php

namespace App\Model;

trait modelo_select
{

    public static function SELECIONA($query, $conector = null)
    {
        try {
            $db = $conector;
            if (!isset($db)) {
                $db = self::Get_Conector();
            }
            if ($db != null) {
                $resut = $db->query($query);
                if (isset($resut)) {
                    return $resut->fetch_all(MYSQLI_ASSOC);
                }
                return null;
            }
        } catch (\Throwable $th) {
            die("<h4>Não foi possivel pegar os dados da Banco de dados [db:seleciona]</h4> : <br> <pre>$th</pre>");
        }
    }
    public static function S_Pagina($query, $itensview, $pagina, $conector = null)
    {
        try {
            $db = $conector;
            if (!isset($db)) {
                $db = self::Get_Conector();
            }
            if ($db != null) {
                $resut = $db->query($query);
                if (mysqli_num_rows($resut) > 0) {
                    $paginas = ceil(mysqli_num_rows($resut) / $itensview);
                    if ($pagina > $paginas) {
                        $pagina = $paginas;
                    }
                    $inicial = ($itensview * $pagina) - $itensview;
                    $query = $query . " limit $inicial,$itensview";
                    $resut = $db->query($query);
                    $prox = $pagina + 1;
                    $ant = $pagina - 1;
                    if ($ant <= 0) {
                        $ant = 1;
                    }
                    if ($prox >= $paginas) {
                        $prox = $paginas;
                    }
                    $dados = [
                        "paginas" => $paginas,
                        "pagina" => $pagina,
                        "prox" => $prox,
                        "ant" => $ant,
                        "itens" => $resut->fetch_all(MYSQLI_ASSOC)
                    ];
                    return $dados;
                } else {
                    return null;
                }
            }
        } catch (\Throwable $th) {
            die("<h4>Não foi possivel pegar os dados da Banco de dados [db:seleciona]</h4> : <br> <pre>$th</pre>");
        }
    }

    public static function S_Linha($query, $conector = null)
    {
        try {
            $db = $conector;
            if (!isset($db)) {
                $db = self::Get_Conector();
            }
            if ($db != null) {
                $resut = $db->query($query);
                if ($resut != null) {
                    $rs = $resut->fetch_all(MYSQLI_ASSOC);
                    if (isset($rs[0])) {
                        return $rs[0];
                    } else {
                        return null;
                    }
                } else {
                    return null;
                }
            }
        } catch (\mysqli_sql_exception $th) {
            die("<h4>Não foi possivel pegar os dados da Banco de dados [db:Slinha]</h4> : <br> <pre>$th</pre>");
        }
    }

    public static function S_Coluna($query, $coluna, $conector = null)
    {
        try {
            $db = $conector;
            if (!isset($db)) {
                $db = self::Get_Conector();
            }
            if ($db != null) {
                $resut = $db->query($query);
                return $resut->fetch_assoc()[$coluna];
            } else {
                die("Não foi possivel conectar ao banco: ");
            }
        } catch (\mysqli_sql_exception $th) {
            die("<h4>Não foi possivel pegar os dados da Banco de dados [db:Scoluna]</h4> : <br> <pre>$th</pre>");
        }
    }

    public static function Numlinhas($query, $conector = null)
    {
        try {

            $db = $conector;
            if (!isset($db)) {
                $db = self::Get_Conector();
            }
            $resut = $db->query($query);
            if (isset($resut)) {
                return mysqli_num_rows($resut);
            } else {
                return 0;
            }
        } catch (\mysqli_sql_exception $th) {
            die("<h4>Não foi possivel pegar os dados da Banco de dados [db:Numlinhas]</h4> : <br> <pre>$th</pre>");
        }
    }

    public static function SELECIONA_TB($tabela, array $where = null, $limit = null, $orderby = null, $conector = null)
    {
        try {

            $db = $conector;
            if (!isset($db)) {
                $db = self::Get_Conector();
            }
            //orderby
            if (!isset($orderby)) {
                $orderby = "";
            } else {
                $orderby = "order by " . $orderby;
            }

            if ($db != null) {

                if ($where == null) {
                    if ($limit != null) {
                        $query = "SELECT *FROM {$tabela} $orderby limit $limit";
                    } else {
                        $query = "SELECT *FROM {$tabela}";
                    }
                } else {

                    if (!is_array($where)) {
                        echo ("<h4> A variável <b>where</b> precisa ser um array </h4>");
                        die("<p>where[0] = <b> coluna && </b> where[1] = <b> Operador </b> where[2] = <b> valor </b></p>");
                    }

                    if ($limit != null) {
                        $query = "SELECT *FROM {$tabela} where $where[0] $where[1] '$where[2]' $orderby limit $limit";
                    } else {
                        $query = "SELECT *FROM {$tabela} where $where[0] $where[1] '$where[2]'";
                    }
                }

                $resut = $db->query($query);
                if ($resut != null) {
                    $rs = $resut->fetch_all(MYSQLI_ASSOC);
                    if (count($rs) > 0) {
                        return $rs;
                    } else {
                        return null;
                    }
                } else {
                    return null;
                }
            }
        } catch (\mysqli_sql_exception $th) {
            die("<h4>Não foi possivel carregar todos os dados da tabela {$tabela} :</h4>" . $th);
        }
    }

    public static function ST_Linha($tabela, array $where, $limit = null, $orderby = null, $conector = null)
    {
        try {

            $db = $conector;
            if (!isset($db)) {
                $db = self::Get_Conector();
            }
            //orderby
            if (!isset($orderby)) {
                $orderby = "";
            } else {
                $orderby = "order by " . $orderby;
            }

            if ($db != null) {

                if (!is_array($where)) {
                    echo ("<h4> A variável <b>where</b> precisa ser um array </h4>");
                    die("<p>where[0] = <b> coluna && </b> where[1] = <b> Operador </b> where[2] = <b> valor </b></p>");
                }

                if ($limit != null) {
                    $query = "SELECT *FROM {$tabela} where $where[0] $where[1] '$where[2]' $orderby limit $limit";
                } else {
                    $query = "SELECT *FROM {$tabela} where $where[0] $where[1] '$where[2]' $orderby";
                }

                $resut = $db->query($query);
                if ($resut != null) {
                    $rs = $resut->fetch_all(MYSQLI_ASSOC);
                    if (isset($rs[0])) {
                        return $rs[0];
                    } else {
                        return null;
                    }
                } else {
                    return null;
                }
            }
        } catch (\mysqli_sql_exception $th) {
            die("<h4>Não foi possivel carregar todos os dados da tabela {$tabela} :</h4>" . $th);
        }
    }

    public static function ST_Coluna($tabela, $coluna, array $where, $conector = null)
    {
        try {
            $db = $conector;
            if (!isset($db)) {
                $db = self::Get_Conector();
            }
            if (!is_array($where)) {
                echo ("<h4> A variável <b>where</b> precisa ser um array </h4>");
                die("<p>where[0] = <b> coluna && </b> where[1] = <b> Operador </b> where[2] = <b> valor </b></p>");
            }
            if ($db != null) {
                $dbname = $tabela;
                $query = "SELECT $coluna FROM {$dbname} where $where[0] $where[1] '$where[2]'";
                $resut = $db->query($query);
                return $resut->fetch_assoc()[$coluna];
            } else {
                die("Não foi possivel conectar ao banco: ");
            }
        } catch (\mysqli_sql_exception $th) {
            die("<h4>Não foi possivel carregar todos os dados da tabela {$tabela} :</h4>" . $th);
        }
    }
}
