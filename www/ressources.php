<?php

require '../vendor/autoload.php';

$s3 = new Aws\S3\S3Client([
    'version' => 'latest',
    'region'  => 'us-east-1',
    'endpoint' => $minio.':9000',
    'use_path_style_endpoint' => true,
    'credentials' => [
        'key'    => 'minio',
        'secret' => 'minio123',
    ],
]);


// Send a PutObject request and get the result object.
$insert = $s3->putObject([
    'Bucket' => 'testbucket',
    'Key'    => 'testkey',
    'Body'   => 'Hello from Minio!!'
]);

$retrive = $s3->getObject([
    'Bucket' => 'testbucket',
    'Key'    => 'testkey',
    'SaveAs' => 'testkey_local'
]);

echo $retrive['Body'];

?>