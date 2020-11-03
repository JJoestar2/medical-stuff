<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MedicineCategoryTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MedicineCategoryTable Test Case
 */
class MedicineCategoryTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MedicineCategoryTable
     */
    protected $MedicineCategory;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.MedicineCategory',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MedicineCategory') ? [] : ['className' => MedicineCategoryTable::class];
        $this->MedicineCategory = $this->getTableLocator()->get('MedicineCategory', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->MedicineCategory);

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
