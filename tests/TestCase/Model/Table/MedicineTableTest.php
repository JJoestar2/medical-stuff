<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MedicineTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MedicineTable Test Case
 */
class MedicineTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MedicineTable
     */
    protected $Medicine;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Medicine',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Medicine') ? [] : ['className' => MedicineTable::class];
        $this->Medicine = $this->getTableLocator()->get('Medicine', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Medicine);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
