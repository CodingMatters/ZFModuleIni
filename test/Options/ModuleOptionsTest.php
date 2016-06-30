<?php

/**
 * The MIT License
 *
 * Copyright (c) 2016, Coding Matters, Inc. (Gab Amba <gamba@gabbydgab.com>)
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace ApplicationTest\Options;

use Application\Options\ModuleOptions;

class ModuleOptionsTest extends \PHPUnit_Framework_TestCase
{
    public function applicationNames()
    {
        return [
            'default'   => [''],
            'custom'    => ['MyApp'],
        ];
    }
    
    /**
     * @test
     * @dataProvider applicationNames
     * @param array $name
     */
    public function applicationNameOption($name)
    {
        $options = new ModuleOptions(['application_name' => $name]);
        $this->assertEquals($name, $options->getApplicationName());
    }
    
    public function organizations()
    {
        return [
            'default'   => [''],
            'custom'    => ['Your Organization'],
        ];
    }
    
    /**
     * @test
     * @dataProvider organizations
     * @param array $name
     */
    public function organizationOption($name)
    {
        $options = new ModuleOptions(['organization' => $name]);
        $this->assertEquals($name, $options->getOrganization());
    }
    
    public function years()
    {
        return [
            'current'   => [date('Y'), date('Y')],
            'previous'  => [date('Y') - 1, date('Y') - 1 . "-" . date('Y')]
        ];
    }
    
    /**
     * @test
     * @dataProvider years
     * @param array $year
     */
    public function copyRightYearOption($year, $expected)
    {
        $options = new ModuleOptions(['copyright_year' => $year]);
        $this->assertEquals($expected, $options->getCopyrightYear());
    }
}
