<?php
namespace AHT\GssiCustomily\Api\Data;

interface GssiCustomilyInterface
{
	const ID = 'id';

    /**
     * Get GssiCustomily id
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set GssiCustomily id
     *
     * @param int $id
     * @return @this
     */
    public function setId($id);

    /**
     * Get GssiCustomily sku
     *
     * @return string|null
     */
    public function getSku();

    /**
     * Set GssiCustomily sku
     *
     * @param string $sku
     * @return null
     */
    public function setSku($sku);

    /**
     * Get GssiCustomily personalizationCode
     *
     * @return string|null
     */
    public function getPersonalizationCode();

    /**
     * Set GssiCustomily personalizationCode
     *
     * @param string $personalizationCode
     * @return null
     */
    public function setPersonalizationCode($personalizationCode);

    /**
     * Get GssiCustomily qty
     *
     * @return string|null
     */
    public function getQty();

    /**
     * Set GssiCustomily qty
     *
     * @param string $qty
     * @return @this
     */
    public function setQty($qty);

    /**
     * Get GssiCustomily price
     *
     * @return string|null
     */
    public function getPrice();

    /**
     * Set GssiCustomily price
     *
     * @param string $price
     * @return null
     */
    public function setPrice($price);
}
