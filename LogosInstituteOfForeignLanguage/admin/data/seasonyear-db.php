
<?php 

// All season years
function getAllSeasonYear($conn) {
    $sql = "SELECT * FROM season_year";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $seasonyears = $stmt->fetchAll();
        return $seasonyears;
    } else {
        return 0;
    }
}

function getSeasonYearByID($id, $conn) {
    $sql = "SELECT * FROM season_year WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() == 1) {
        $seasonyears = $stmt->fetch();
        return $seasonyears;
    } else {
        return 0;
    }
}

// Delete
function removeSeasonYearByID($id, $conn) {
    $sql = "DELETE FROM season_year WHERE id=?";
    $stmt = $conn->prepare($sql);
    $re = $stmt->execute([$id]);
    if ($re) {
        return 1;
    } else {
        return 0;
    }
}











?>