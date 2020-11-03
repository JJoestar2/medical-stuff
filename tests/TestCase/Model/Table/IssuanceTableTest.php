<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IssuanceTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IssuanceTable Test Case
 */
class IssuanceTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\IssuanceTable
     */
    protected $Issuance;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Issuance',
        'app.Departments',
        'app.Users',
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
        $config = $this->getTableLocator()->exists('Issuance') ? [] : ['className' => IssuanceTable::class];
        $this->Issuance = $this->getTableLocator()->get('Issuance', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Issuance);

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
