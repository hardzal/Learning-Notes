<?php
echo "Tomorrow's time stamp is: ". date('D-d', strtotime('tomorrow')). "<br>";
echo "And in 2 weeks, 5 days and 12 hours time: ". date('d-m', strtotime('+2 weeks 5 days 12 hours')) . "<br>";
