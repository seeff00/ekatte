<?php

namespace App\Utils;

use App\Repository\AreaLevelOneRepository;
use App\Repository\AreaLevelTwoRepository;
use App\Repository\AreaRepository;
use App\Repository\DB;
use App\Repository\DocumentRepository;
use App\Repository\MunicipalityRepository;
use App\Repository\RegionRepository;
use App\Repository\SofTerritorialUnitRepository;
use App\Repository\TerritorialFormationsRepository;
use App\Repository\TerritorialUnitRepository;
use App\Repository\TownHallRepository;
use Exception;

class DBSeeder
{
    /**
     * Run all seeders.
     *
     * @return void
     */
    public function run(): void
    {
        self::seedsAreas();
        self::seedsAreasLevelOne();
        self::seedsAreasLevelTwo();
        self::seedsDocuments();
        self::seedsMunicipalities();
        self::seedsRegions();
        self::seedsSofTerritorialUnits();
        self::seedsTerritorialFormations();
        self::seedsTerritorialUnits();
        self::seedsTownHalls();
    }

    /**
     * Seeds areas.
     *
     * @return void
     */
    protected function seedsAreas(): void
    {
        try {
            $file = $_SERVER['DOCUMENT_ROOT'] . '/archives/ek_raion.json';
            $allowedKeys = ['raion', 'name', 'name_en', 'document'];
            $repository = new AreaRepository(DB::getInstance());

            $areas = Common::parseJsonFile($file);
            foreach ($areas as $area) {
                if (count(array_intersect_key(array_flip($allowedKeys), $area)) === count($allowedKeys)) {
                    $repository->create($area);
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Seeds areas level one.
     *
     * @return void
     */
    protected function seedsAreasLevelOne(): void
    {
        try {
            $file = $_SERVER['DOCUMENT_ROOT'] . '/archives/ek_reg1.json';
            $allowedKeys = ['region', 'nuts1', 'name', 'name_en', 'document'];
            $repository = new AreaLevelOneRepository(DB::getInstance());

            $areasLevelOne = Common::parseJsonFile($file);
            foreach ($areasLevelOne as $areaLevelOne) {
                if (count(array_intersect_key(array_flip($allowedKeys), $areaLevelOne)) === count($allowedKeys)) {
                    $repository->create($areaLevelOne);
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Seeds areas level two.
     *
     * @return void
     */
    protected function seedsAreasLevelTwo(): void
    {
        try {
            $file = $_SERVER['DOCUMENT_ROOT'] . '/archives/ek_reg2.json';
            $allowedKeys = ['region', 'nuts1', 'nuts2', 'name', 'name_en', 'document'];
            $repository = new AreaLevelTwoRepository(DB::getInstance());

            $areasLevelTwo = Common::parseJsonFile($file);
            foreach ($areasLevelTwo as $areaLevelTwo) {
                if (count(array_intersect_key(array_flip($allowedKeys), $areaLevelTwo)) === count($allowedKeys)) {
                    $repository->create($areaLevelTwo);
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Seeds documents.
     *
     * @return void
     */
    protected function seedsDocuments(): void
    {
        try {
            $file = $_SERVER['DOCUMENT_ROOT'] . '/archives/ek_doc.json';
            $allowedKeys = [
                'document',
                'doc_kind',
                'doc_name',
                'doc_name_en',
                'doc_inst',
                'doc_num',
                'doc_date',
                'doc_act',
                'dv_danni',
                'dv_date',
            ];
            $repository = new DocumentRepository(DB::getInstance());

            $documents = Common::parseJsonFile($file);
            foreach ($documents as $document) {
                if (count(array_intersect_key(array_flip($allowedKeys), $document)) === count($allowedKeys)) {
                    $repository->create($document);
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Seeds municipalities.
     *
     * @return void
     */
    protected function seedsMunicipalities(): void
    {
        try {
            $file = $_SERVER['DOCUMENT_ROOT'] . '/archives/ek_obst.json';
            $allowedKeys = [
                'obshtina',
                'ekatte',
                'name',
                'name_en',
                'nuts1',
                'nuts2',
                'nuts3',
                'category',
                'document',
                'full_name_bul',
            ];
            $repository = new MunicipalityRepository(DB::getInstance());

            $municipalities = Common::parseJsonFile($file);
            foreach ($municipalities as $municipality) {
                if (count(array_intersect_key(array_flip($allowedKeys), $municipality)) === count($allowedKeys)) {
                    $repository->create($municipality);
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Seeds regions.
     *
     * @return void
     */
    protected function seedsRegions(): void
    {
        try {
            $file = $_SERVER['DOCUMENT_ROOT'] . '/archives/ek_obl.json';
            $allowedKeys = [
                'oblast',
                'ekatte',
                'name',
                'name_en',
                'region',
                'nuts1',
                'nuts2',
                'nuts3',
                'document',
                'full_name_bul',
            ];
            $repository = new RegionRepository(DB::getInstance());

            $regions = Common::parseJsonFile($file);
            foreach ($regions as $region) {
                if (count(array_intersect_key(array_flip($allowedKeys), $region)) === count($allowedKeys)) {
                    $repository->create($region);
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Seeds sof territorial units.
     *
     * @return void
     */
    protected function seedsSofTerritorialUnits(): void
    {
        try {
            $file = $_SERVER['DOCUMENT_ROOT'] . '/archives/sof_rai.json';
            $allowedKeys = [
                'ekatte',
                't_v_m',
                'name',
                'name_en',
                'raion',
                'kind',
                'document',
            ];
            $repository = new SofTerritorialUnitRepository(DB::getInstance());

            $sofTerritorialUnits = Common::parseJsonFile($file);
            foreach ($sofTerritorialUnits as $sofTerritorialUnit) {
                if (count(array_intersect_key(array_flip($allowedKeys), $sofTerritorialUnit)) === count($allowedKeys)) {
                    $repository->create($sofTerritorialUnit);
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Seeds territorial formations.
     *
     * @return void
     */
    protected function seedsTerritorialFormations(): void
    {
        try {
            $file = $_SERVER['DOCUMENT_ROOT'] . '/archives/ek_sobr.json';
            $allowedKeys = [
                'ekatte',
                'kind',
                'name',
                'name_en',
                'area1',
                'area2',
                'document',
                'abc',
            ];
            $repository = new TerritorialFormationsRepository(DB::getInstance());

            $territorialFormations = Common::parseJsonFile($file);
            foreach ($territorialFormations as $territorialFormation) {
                if (count(array_intersect_key(array_flip($allowedKeys), $territorialFormation)) === count($allowedKeys)) {
                    $repository->create($territorialFormation);
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Seeds territorial units.
     *
     * @return void
     */
    protected function seedsTerritorialUnits(): void
    {
        try {
            $file = $_SERVER['DOCUMENT_ROOT'] . '/archives/ek_atte.json';
            $allowedKeys = [
                'ekatte',
                't_v_m',
                'name',
                'name_en',
                'oblast',
                'obshtina',
                'kmetstvo',
                'kind',
                'category',
                'altitude',
                'document',
                'abc',
                'nuts1',
                'nuts2',
                'nuts3',
                'text',
                'oblast_name',
                'obshtina_name',
            ];
            $repository = new TerritorialUnitRepository(DB::getInstance());

            $territorialUnits = Common::parseJsonFile($file);
            foreach ($territorialUnits as $territorialUnit) {
                if (count(array_intersect_key(array_flip($allowedKeys), $territorialUnit)) === count($allowedKeys)) {
                    $repository->create($territorialUnit);
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Seeds town halls.
     *
     * @return void
     */
    protected function seedsTownHalls(): void
    {
        try {
            $file = $_SERVER['DOCUMENT_ROOT'] . '/archives/ek_kmet.json';
            $allowedKeys = [
                'kmetstvo',
                'name',
                'name_en',
                'ekatte',
                'document',
                'category',
                'nuts1',
                'nuts2',
                'nuts3',
            ];
            $repository = new TownHallRepository(DB::getInstance());

            $townHalls = Common::parseJsonFile($file);
            foreach ($townHalls as $townHall) {
                if (count(array_intersect_key(array_flip($allowedKeys), $townHall)) === count($allowedKeys)) {
                    $repository->create($townHall);
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}