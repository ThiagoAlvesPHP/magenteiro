<?php
namespace Magenteiro\Comments\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;

class AddDummyComments implements \Magento\Framework\Setup\Patch\DataPatchInterface, \Magento\Framework\Setup\Patch\PatchRevertableInterface
{

    private $moduleDataSetup;

    public function __construct(ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * Get array of patches that have to be executed prior to this.
     *
     * Example of implementation:
     *
     * [
     *      \Vendor_Name\Module_Name\Setup\Patch\Patch1::class,
     *      \Vendor_Name\Module_Name\Setup\Patch\Patch2::class
     * ]
     *
     * @return string[]
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * Get aliases (previous names) for the patch.
     *
     * @return string[]
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * Run code inside patch
     * If code fails, patch must be reverted, in case when we are speaking about schema - then under revert
     * means run PatchInterface::revert()
     *
     * If we speak about data, under revert means: $transaction->rollback()
     *
     * @return $this
     */
    public function apply()
    {
        $this->moduleDataSetup->startSetup();
        $table = $this->moduleDataSetup->getTable('magenteiro_comments');
        $this->moduleDataSetup->getConnection()->insert($table,[
           'product_id' => 1,
           'customer_id' => 2,
           'comment' => 'Comentario de teste'
        ]);
        $this->moduleDataSetup->getConnection()->insertMultiple($table, [
            [
                'product_id' => 12,
                'customer_id' => 2,
                'comment' => 'Comentario de teste 2'
            ],
            [
                'product_id' => 10,
                'customer_id' => 2,
                'comment' => 'Comentario de teste 3'
            ]
        ]);
        $this->moduleDataSetup->endSetup();
    }

    /**
     * Rollback all changes, done by this patch
     *
     * @return void
     */
    public function revert()
    {
        $this->moduleDataSetup->startSetup();
        $table = $this->moduleDataSetup->getTable('magenteiro_comments');
        $this->moduleDataSetup->getConnection()->delete('magenteiro_comments', "comment like 'Comentario de teste%'");
        $this->moduleDataSetup->endSetup();

    }
}
