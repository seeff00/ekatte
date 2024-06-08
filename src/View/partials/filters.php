<?php
if (!isset($filters) || count($filters) <= 0) {
    return;
}
?>

<div>
<form id="filters" class="filters" method="POST" action="/<?php echo $response['action'] ?? ''; ?>">
    <div>
        <?php foreach ($filters as $filterKey => $filterLabel) {
            echo "<span>";
            echo "<label for='$filterKey'>$filterLabel</label><br>";
            echo "<input id='$filterKey' type='text' name='$filterKey' value='" . ($_GET[$filterKey] ?? ($_POST[$filterKey] ?? '')) . "' />";
            echo "</span>";
        } ?>

        <input type="hidden" name="page" value="<?php echo $_GET['page'] ?? ($_POST['page'] ?? 1); ?>">
        <input type="hidden" name="perPage" value="<?php echo $_GET['perPage'] ?? ($_POST['perPage'] ?? 100) ?>">

        <input id="submit" type="submit" value="Търсене" />
        <input id="reset-inputs" type="button" value="Изчистване на филтри" />
    </div>
</form>
</div>