<?php
declare(strict_types=1);

namespace Bitpay\BPCheckout\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Transaction extends AbstractDb
{
    private const TABLE_NAME = 'bitpay_transactions';

    /**
     * @codeCoverageIgnore
     */
    public function _construct()
    {
        $this->_init(self::TABLE_NAME, 'entity_id');
    }

    public function add(string $incrementId, string $invoiceID, string $status): void
    {
        $connection = $this->getConnection();
        $table_name = $connection->getTableName(self::TABLE_NAME);
        $connection->insertForce(
            $table_name,
            ['order_id' => $incrementId, 'transaction_id' => $invoiceID,'transaction_status'=> $status]
        );
    }

    public function findBy(string $orderId, string $orderInvoiceId): ?array
    {
        $connection = $this->getConnection();
        $tableName = $connection->getTableName(self::TABLE_NAME);

        $sql = $connection->select()
            ->from($tableName)
            ->where('order_id = ?', $orderId)
            ->where('transaction_id = ?', $orderInvoiceId);

        $row = $connection->fetchAll($sql);

        if (!$row) {
            return null;
        }

        return $row;
    }

    public function update(string $field, string $value, array $where): void
    {
        $connection = $this->getConnection();
        $tableName = $connection->getTableName(self::TABLE_NAME);

        $connection->update($tableName, [$field => $value], $where);
    }
}
