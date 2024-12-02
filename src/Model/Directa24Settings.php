<?php

/**
 * This source file is proprietary and part of Rebilly.
 *
 * (c) Rebilly SRL
 *     Rebilly Ltd.
 *     Rebilly Inc.
 *
 * @see https://www.rebilly.com
 */

declare(strict_types=1);

namespace Rebilly\Sdk\Model;

use JsonSerializable;

class Directa24Settings implements JsonSerializable
{
    public const BANKS_AA = 'AA';

    public const BANKS_AL = 'AL';

    public const BANKS_AZ = 'AZ';

    public const BANKS_B = 'B';

    public const BANKS_BAB = 'BAB';

    public const BANKS_BB = 'BB';

    public const BANKS_BC = 'BC';

    public const BANKS_BE = 'BE';

    public const BANKS_BL = 'BL';

    public const BANKS_BM = 'BM';

    public const BANKS_BN = 'BN';

    public const BANKS_BP = 'BP';

    public const BANKS_BQ = 'BQ';

    public const BANKS_BU = 'BU';

    public const BANKS_BV = 'BV';

    public const BANKS_BW = 'BW';

    public const BANKS_BX = 'BX';

    public const BANKS_BZ = 'BZ';

    public const BANKS_CA = 'CA';

    public const BANKS_CE = 'CE';

    public const BANKS_CI = 'CI';

    public const BANKS_CU = 'CU';

    public const BANKS_EF = 'EF';

    public const BANKS_EN = 'EN';

    public const BANKS_EY = 'EY';

    public const BANKS_FA = 'FA';

    public const BANKS_FB = 'FB';

    public const BANKS_FC = 'FC';

    public const BANKS_GC = 'GC';

    public const BANKS_GG = 'GG';

    public const BANKS_HC = 'HC';

    public const BANKS_I = 'I';

    public const BANKS_IA = 'IA';

    public const BANKS_IB = 'IB';

    public const BANKS_JM = 'JM';

    public const BANKS_LC = 'LC';

    public const BANKS_LE = 'LE';

    public const BANKS_LL = 'LL';

    public const BANKS_MC = 'MC';

    public const BANKS_ME = 'ME';

    public const BANKS_MD = 'MD';

    public const BANKS_MP = 'MP';

    public const BANKS_MT = 'MT';

    public const BANKS_NB = 'NB';

    public const BANKS_OM = 'OM';

    public const BANKS_OX = 'OX';

    public const BANKS_PC = 'PC';

    public const BANKS_PH = 'PH';

    public const BANKS_PL = 'PL';

    public const BANKS_SB = 'SB';

    public const BANKS_SC = 'SC';

    public const BANKS_SE = 'SE';

    public const BANKS_SF = 'SF';

    public const BANKS_SM = 'SM';

    public const BANKS_SS = 'SS';

    public const BANKS_ST = 'ST';

    public const BANKS_SU = 'SU';

    public const BANKS_TC = 'TC';

    public const BANKS_TK = 'TK';

    public const BANKS_TG = 'TG';

    public const BANKS_TR = 'TR';

    public const BANKS_TY = 'TY';

    public const BANKS_RY = 'RY';

    public const BANKS_UB = 'UB';

    public const BANKS_UI = 'UI';

    public const BANKS_UL = 'UL';

    public const BANKS_US = 'US';

    public const BANKS_VD = 'VD';

    public const BANKS_VI = 'VI';

    public const BANKS_WA = 'WA';

    public const BANKS_WP = 'WP';

    public const BANKS_WU = 'WU';

    public const BANKS_XA = 'XA';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('banks', $data)) {
            $this->setBanks($data['banks']);
        }
        if (array_key_exists('skipStep', $data)) {
            $this->setSkipStep($data['skipStep']);
        }
        if (array_key_exists('useV3Api', $data)) {
            $this->setUseV3Api($data['useV3Api']);
        }
        if (array_key_exists('storeIdNumber', $data)) {
            $this->setStoreIdNumber($data['storeIdNumber']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return null|string[]
     */
    public function getBanks(): ?array
    {
        return $this->fields['banks'] ?? null;
    }

    /**
     * @param null|string[] $banks
     */
    public function setBanks(null|array $banks): static
    {
        $this->fields['banks'] = $banks;

        return $this;
    }

    public function getSkipStep(): ?bool
    {
        return $this->fields['skipStep'] ?? null;
    }

    public function setSkipStep(null|bool $skipStep): static
    {
        $this->fields['skipStep'] = $skipStep;

        return $this;
    }

    public function getUseV3Api(): ?bool
    {
        return $this->fields['useV3Api'] ?? null;
    }

    public function setUseV3Api(null|bool $useV3Api): static
    {
        $this->fields['useV3Api'] = $useV3Api;

        return $this;
    }

    public function getStoreIdNumber(): ?bool
    {
        return $this->fields['storeIdNumber'] ?? null;
    }

    public function setStoreIdNumber(null|bool $storeIdNumber): static
    {
        $this->fields['storeIdNumber'] = $storeIdNumber;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('banks', $this->fields)) {
            $data['banks'] = $this->fields['banks'];
        }
        if (array_key_exists('skipStep', $this->fields)) {
            $data['skipStep'] = $this->fields['skipStep'];
        }
        if (array_key_exists('useV3Api', $this->fields)) {
            $data['useV3Api'] = $this->fields['useV3Api'];
        }
        if (array_key_exists('storeIdNumber', $this->fields)) {
            $data['storeIdNumber'] = $this->fields['storeIdNumber'];
        }

        return $data;
    }
}
