<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StoreTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StoreTable Test Case
 */
class StoreTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StoreTable
     */
    protected $Store;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Store',
        'app.Medicines',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Store') ? [] : ['className' => StoreTable::class];
        $this->Store = $this->getTableLocator()->get('Store', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Store);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
