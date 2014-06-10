<?php
/**
 * ReportGenerator -- report.php
 * User: Simon Beattie @si_bt
 * Date: 14/04/2014
 * Time: 12:27
 */


// GET
// reportid=<REPORTID>&severity=<SEVERITY>
// listreports=1

spl_autoload_register(function ($className) {
    $fileName = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';

    if (!file_exists($fileName)) {
        return false;
    }

    require($fileName);
});

try {
    $pdo = new PDO('sqlite:../reports.sqlite');
} catch (PDOException $pdoError) {
    echo $pdoError->getMessage();
    exit;
}

$reports = new \Library\Reports($pdo); // Create report object


if (array_key_exists('listreports', $_GET)) {
    echo json_encode($reports->listReports()); // Return list of reports imported into the system
    die();
};

if (array_key_exists('report', $_GET)) {
    if (array_key_exists('reportid', $_GET)) {
        switch($_GET['report']) {

            case 1:
                if (array_key_exists('severity', $_GET)) {
                    echo json_encode($reports->getHosts($_GET['reportid'], $_GET['severity'])); // Return report details in JSON format.
                }
                else
                {
                    die("You must pass a severity level");
                }
                break;
            case 2:
                if (array_key_exists('severity', $_GET)) {
                    echo json_encode($reports->getVulnerabilities($_GET['reportid'], $_GET['severity']));
                }
                else
                {
                    die("You must pass a severity level");
                }
                break;
            case 3:
                if (array_key_exists('severity', $_GET)) {
                    echo json_encode($reports->getDescriptions($_GET['reportid'], $_GET['severity']));
                }
                else
                {
                    die("You must pass a severity level");
                }
                break;
            case 4:
                if (array_key_exists('severity', $_GET)) {
                    echo json_encode($reports->getPCI($_GET['reportid'], $_GET['severity']));
                }
                else
                {
                    die("You must pass a severity level");
                }
                break;
            case 5:
                echo json_encode($reports->getOpenDLP($_GET['filename']));
                break;
        }

    }
    else
    {
        die("You must pass a reportID");
    }
}




