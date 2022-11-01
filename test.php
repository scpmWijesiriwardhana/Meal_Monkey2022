<?php

                    $query_result = mysqli_query($db, "select * from vw_review");
                    while ($row = mysqli_fetch_array($query_result)) {