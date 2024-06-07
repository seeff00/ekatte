<?php

namespace App\Utils;

use App\Model\Area;
use App\Model\AreaLevelOne;
use App\Model\AreaLevelTwo;
use App\Model\Document;
use App\Model\Municipality;
use App\Model\Region;
use App\Model\SofTerritorialUnit;
use App\Model\TerritorialFormation;
use App\Model\TerritorialUnit;
use App\Model\TownHall;
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
        $file = $_SERVER['DOCUMENT_ROOT'] . '/archives/ek_raion.json';
        $allowedKeys = ['raion', 'name', 'name_en', 'document'];
        $repository = new AreaRepository(DB::getInstance());

        $areas = Common::parseJsonFile($file);
        foreach ($areas as $area) {
            if (count(array_intersect_key(array_flip($allowedKeys), $area)) === count($allowedKeys)) {
                $newArea = new Area();
                $newArea->setRaion(trim($area['raion']) ?? '');
                $newArea->setName(trim($area['name']) ?? '');
                $newArea->setNameEn(trim($area['name_en']) ?? '');
                $newArea->setDocument(trim($area['document']) ?? 0);
                $newArea->setCreatedAt(date("Y-m-d H:i:s"));

                $repository->create($newArea);
            }
        }
    }

    /**
     * Seeds areas level one.
     *
     * @return void
     */
    protected function seedsAreasLevelOne(): void
    {
        $file = $_SERVER['DOCUMENT_ROOT'] . '/archives/ek_reg1.json';
        $allowedKeys = ['region', 'nuts1', 'name', 'name_en', 'document'];
        $repository = new AreaLevelOneRepository(DB::getInstance());

        $areasLevelOne = Common::parseJsonFile($file);
        foreach ($areasLevelOne as $areaLevelOne) {
            if (count(array_intersect_key(array_flip($allowedKeys), $areaLevelOne)) === count($allowedKeys)) {
                $newAreaLevelOne = new AreaLevelOne();
                $newAreaLevelOne->setRegion(trim($areaLevelOne['region']) ?? '');
                $newAreaLevelOne->setNuts1(trim($areaLevelOne['nuts1']) ?? '');
                $newAreaLevelOne->setName(trim($areaLevelOne['name']) ?? '');
                $newAreaLevelOne->setNameEn(trim($areaLevelOne['name_en']) ?? '');
                $newAreaLevelOne->setDocument(trim($areaLevelOne['document']) ?? 0);
                $newAreaLevelOne->setCreatedAt(date("Y-m-d H:i:s"));

                $repository->create($newAreaLevelOne);
            }
        }
    }

    /**
     * Seeds areas level two.
     *
     * @return void
     */
    protected function seedsAreasLevelTwo(): void
    {
        $file = $_SERVER['DOCUMENT_ROOT'] . '/archives/ek_reg2.json';
        $allowedKeys = ['region', 'nuts1', 'nuts2', 'name', 'name_en', 'document'];
        $repository = new AreaLevelTwoRepository(DB::getInstance());

        $areasLevelTwo = Common::parseJsonFile($file);
        foreach ($areasLevelTwo as $areaLevelTwo) {
            if (count(array_intersect_key(array_flip($allowedKeys), $areaLevelTwo)) === count($allowedKeys)) {
                $newAreaLevelTwo = new AreaLevelTwo();
                $newAreaLevelTwo->setRegion(trim($areaLevelTwo['region']) ?? '');
                $newAreaLevelTwo->setNuts1(trim($areaLevelTwo['nuts1']) ?? '');
                $newAreaLevelTwo->setNuts2(trim($areaLevelTwo['nuts2']) ?? '');
                $newAreaLevelTwo->setName(trim($areaLevelTwo['name']) ?? '');
                $newAreaLevelTwo->setNameEn(trim($areaLevelTwo['name_en']) ?? '');
                $newAreaLevelTwo->setDocument(trim($areaLevelTwo['document']) ?? 0);
                $newAreaLevelTwo->setCreatedAt(date("Y-m-d H:i:s"));

                $repository->create($newAreaLevelTwo);
            }
        }
    }

    /**
     * Seeds documents.
     *
     * @return void
     */
    protected function seedsDocuments(): void
    {
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
                $newDocument = new Document();
                $newDocument->setDocument(trim($document['document']) ?? '');
                $newDocument->setDocKind(trim($document['doc_kind']) ?? '');
                $newDocument->setDocName(trim($document['doc_name']) ?? '');
                $newDocument->setDocNameEn(trim($document['doc_name_en']) ?? '');
                $newDocument->setDocInst(trim($document['doc_inst']) ?? '');
                $newDocument->setDocNum(trim($document['doc_num']) ?? '');
                $newDocument->setDocDate(Common::validateDate($document['doc_date']) ? trim($document['doc_date']) : null);
                $newDocument->setDocAct(Common::validateDate($document['doc_act']) ? trim($document['doc_act']) : null);
                $newDocument->setDvDanni(trim($document['dv_danni']) ?? '');
                $newDocument->setDvDate(Common::validateDate($document['dv_date']) ? trim($document['dv_date']) : null);
                $newDocument->setCreatedAt(date("Y-m-d H:i:s"));

                $repository->create($newDocument);
            }
        }
    }

    /**
     * Seeds municipalities.
     *
     * @return void
     */
    protected function seedsMunicipalities(): void
    {
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
                $newMunicipality = new Municipality();
                $newMunicipality->setObshtina(trim($municipality['obshtina']) ?? '');
                $newMunicipality->setEkatte(trim($municipality['ekatte']) ?? '');
                $newMunicipality->setName(trim($municipality['name']) ?? '');
                $newMunicipality->setNameEn(trim($municipality['name_en']) ?? '');
                $newMunicipality->setNuts1(trim($municipality['nuts1']) ?? '');
                $newMunicipality->setNuts2(trim($municipality['nuts2']) ?? '');
                $newMunicipality->setNuts3(trim($municipality['nuts3']) ?? '');
                $newMunicipality->setCategory(trim($municipality['category']) ?? 0);
                $newMunicipality->setDocument(trim($municipality['document']) ?? 0);
                $newMunicipality->setFullNameBul(trim($municipality['full_name_bul']) ?? '');
                $newMunicipality->setCreatedAt(date("Y-m-d H:i:s"));

                $repository->create($newMunicipality);
            }
        }
    }

    /**
     * Seeds regions.
     *
     * @return void
     */
    protected function seedsRegions(): void
    {
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
                $newRegion = new Region();
                $newRegion->setOblast(trim($region['oblast']) ?? '');
                $newRegion->setEkatte(trim($region['ekatte']) ?? '');
                $newRegion->setName(trim($region['name']) ?? '');
                $newRegion->setNameEn(trim($region['name_en']) ?? '');
                $newRegion->setRegion(trim($region['region']) ?? '');
                $newRegion->setNuts1(trim($region['nuts1']) ?? '');
                $newRegion->setNuts2(trim($region['nuts2']) ?? '');
                $newRegion->setNuts3(trim($region['nuts3']) ?? '');
                $newRegion->setDocument(trim($region['document']) ?? 0);
                $newRegion->setFullNameBul(trim($region['full_name_bul']) ?? '');
                $newRegion->setCreatedAt(date("Y-m-d H:i:s"));

                $repository->create($newRegion);
            }
        }
    }

    /**
     * Seeds sof territorial units.
     *
     * @return void
     */
    protected function seedsSofTerritorialUnits(): void
    {
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
                $newSofTerritorialUnit = new SofTerritorialUnit();
                $newSofTerritorialUnit->setEkatte(trim($sofTerritorialUnit['ekatte']) ?? '');
                $newSofTerritorialUnit->setTVM(trim($sofTerritorialUnit['t_v_m']) ?? '');
                $newSofTerritorialUnit->setName(trim($sofTerritorialUnit['name']) ?? '');
                $newSofTerritorialUnit->setNameEn(trim($sofTerritorialUnit['name_en']) ?? '');
                $newSofTerritorialUnit->setRaion(trim($sofTerritorialUnit['raion']) ?? '');
                $newSofTerritorialUnit->setKind(trim($sofTerritorialUnit['kind']) ?? 0);
                $newSofTerritorialUnit->setDocument(trim($sofTerritorialUnit['document']) ?? 0);
                $newSofTerritorialUnit->setCreatedAt(date("Y-m-d H:i:s"));

                $repository->create($newSofTerritorialUnit);
            }
        }
    }

    /**
     * Seeds territorial formations.
     *
     * @return void
     */
    protected function seedsTerritorialFormations(): void
    {
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
                $newTerritorialFormation = new TerritorialFormation();
                $newTerritorialFormation->setEkatte(trim($territorialFormation['ekatte']) ?? '');
                $newTerritorialFormation->setKind(trim($territorialFormation['kind']) ?? 0);
                $newTerritorialFormation->setName(trim($territorialFormation['name']) ?? '');
                $newTerritorialFormation->setNameEn(trim($territorialFormation['name_en']) ?? '');
                $newTerritorialFormation->setArea1(trim($territorialFormation['area1']) ?? '');
                $newTerritorialFormation->setArea2(trim($territorialFormation['area2']) ?? '');
                $newTerritorialFormation->setDocument(trim($territorialFormation['document']) ?? 0);
                $newTerritorialFormation->setAbc(trim($territorialFormation['abc']) ?? 0);
                $newTerritorialFormation->setCreatedAt(date("Y-m-d H:i:s"));

                $repository->create($newTerritorialFormation);
            }
        }
    }

    /**
     * Seeds territorial units.
     *
     * @return void
     */
    protected function seedsTerritorialUnits(): void
    {
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
                $newTerritorialUnit = new TerritorialUnit();
                $newTerritorialUnit->setEkatte(trim($territorialUnit['ekatte']) ?? '');
                $newTerritorialUnit->setTVM(trim($territorialUnit['t_v_m']) ?? '');
                $newTerritorialUnit->setName(trim($territorialUnit['name']) ?? '');
                $newTerritorialUnit->setNameEn(trim($territorialUnit['name_en']) ?? '');
                $newTerritorialUnit->setOblast(trim($territorialUnit['oblast']) ?? '');
                $newTerritorialUnit->setObshtina(trim($territorialUnit['obshtina']) ?? '');
                $newTerritorialUnit->setKmetstvo(trim($territorialUnit['kmetstvo']) ?? '');
                $newTerritorialUnit->setKind(trim($territorialUnit['kind']) ?? 0);
                $newTerritorialUnit->setCategory(trim($territorialUnit['category']) ?? 0);
                $newTerritorialUnit->setAltitude(trim($territorialUnit['altitude']) ?? 0);
                $newTerritorialUnit->setDocument(trim($territorialUnit['document']) ?? 0);
                $newTerritorialUnit->setAbc(trim($territorialUnit['abc']) ?? '');
                $newTerritorialUnit->setNuts1(trim($territorialUnit['nuts1']) ?? '');
                $newTerritorialUnit->setNuts2(trim($territorialUnit['nuts2']) ?? '');
                $newTerritorialUnit->setNuts3(trim($territorialUnit['nuts3']) ?? '');
                $newTerritorialUnit->setText(trim($territorialUnit['text']) ?? '');
                $newTerritorialUnit->setOblastName(trim($territorialUnit['oblast_name']) ?? '');
                $newTerritorialUnit->setObshtinaName(trim($territorialUnit['obshtina_name']) ?? '');
                $newTerritorialUnit->setCreatedAt(date("Y-m-d H:i:s"));

                $repository->create($newTerritorialUnit);
            }
        }
    }

    /**
     * Seeds town halls.
     *
     * @return void
     */
    protected function seedsTownHalls(): void
    {
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
                $newTownHall = new TownHall();
                $newTownHall->setKmetstvo(trim($townHall['kmetstvo']) ?? '');
                $newTownHall->setName(trim($townHall['name']) ?? '');
                $newTownHall->setNameEn(trim($townHall['name_en']) ?? '');
                $newTownHall->setEkatte(trim($townHall['ekatte']) ?? '');
                $newTownHall->setDocument(trim($townHall['document']) ?? 0);
                $newTownHall->setCategory(trim($townHall['category']) ?? 0);
                $newTownHall->setNuts1(trim($townHall['nuts1']) ?? '');
                $newTownHall->setNuts2(trim($townHall['nuts2']) ?? '');
                $newTownHall->setNuts3(trim($townHall['nuts3']) ?? '');
                $newTownHall->setCreatedAt(date("Y-m-d H:i:s"));

                $repository->create($newTownHall);
            }
        }
    }
}