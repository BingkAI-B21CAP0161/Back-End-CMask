<?php

$dataGet = $_REQUEST['data'] ?? "";
$key = $_REQUEST['key'] ?? "";

$keyApi = "12345";

$dataSource = [
    'user' => [
        ['id' => '1', 'name' => 'Ibnu'],
        ['id' => '1', 'name' => 'Agas'],
        ['id' => '1', 'name' => 'Aceng'],
    ],
    'gudang' => [
        ['id' => '1', 'name' => 'beras'],
        ['id' => '1', 'name' => 'sagu'],
        ['id' => '1', 'name' => 'tebu'],
    ]
];


try {
    //code...

    if (!isset($_REQUEST['key'])) throw new Exception("No Access");
    if ($key != $keyApi) throw new Exception("Invalid Token");

    $data = $dataSource[$dataGet] ?? [];

    $result = [
        'status' => 'ok',
        'data' => $data
    ];
} catch (\Throwable $th) {
    $result = [
        'status' => 'fail',
        'message' => $th->GetMessage(),
    ];
} catch (\Exception $ex) {
    $result = [
        'status' => 'fail',
        'message' => $ex->GetMessage(),
    ];
} finally {
    echo json_encode($result);
}
