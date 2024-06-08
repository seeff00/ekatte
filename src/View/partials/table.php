
<?php if (isset($response['tableColumns']) && isset($response['tableRows'])) { ?>
    <table>
        <thead>
        <?php
        echo "<tr>";
        foreach ($response['tableColumns'] as $key => $value) {
            echo "<th>" . $response['tableColumns'][$key] . "</th>";
        }
        echo "</tr>";
        ?>
        </thead>
        <tbody>
        <?php
        foreach ($response['tableRows'] as $item) {
            echo "<tr>";
            foreach ($response['tableColumns'] as $key => $value) {
                if (isset($item[$key])) {
                    echo "<td>" . $item[$key] . "</td>";
                }
            }
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
<?php } ?>