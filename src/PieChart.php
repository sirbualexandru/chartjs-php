<?php

namespace Bbsnly\ChartJs;

class PieChart extends Chart
{
    /**
     * PieChart constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->type = 'pie';
    }
}
