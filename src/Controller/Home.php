<?php

namespace App\Controller;

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

class Home extends Controller
{
    /**
     * Home index action handler.
     *
     * @param HTTPRequest $request
     * @return void
     */
    public function index(HTTPRequest $request): void
    {
        $response = [];

        $this->view('home/index', $response);
    }

    /**
     * @param HTTPRequest $request
     * @return void
     */
    public function areas(HTTPRequest $request): void
    {
        $repository = new AreaRepository(DB::getInstance());
        $area = $this->getArea($request);

        $page = intval($request->getInputByName('page'));
        $page = $page > 0 ? $page : 1;
        $perPage = intval($request->getInputByName('perPage'));
        $perPage = $perPage > 0 ? $perPage : 10;

        $results = $repository->search($area, $page, $perPage);

        $response = [
            'tableColumns' => [
                'id' => '№',
                'raion' => 'Идентификационен код',
                'name' => 'Име',
                'name_en' => 'Транслитерация',
                'document' => 'Код на документа',
            ],
            'data' => $results,
            'filters' => [
                'raion' => 'Идентификационен код',
                'name' => 'Име',
                'name_en' => 'Транслитерация',
                'document' => 'Код на документа',
            ],
            'action' => 'areas',
        ];

        $this->view('home/areas', $response);
    }

    /**
     * @param HTTPRequest $request
     * @return void
     */
    public function areasLevelOne(HTTPRequest $request): void
    {
        $repository = new AreaLevelOneRepository(DB::getInstance());
        $areaLevelOne = new AreaLevelOne();

        $page = intval($request->getInputByName('page'));
        $page = $page > 0 ? $page : 1;
        $perPage = intval($request->getInputByName('perPage'));
        $perPage = $perPage > 0 ? $perPage : 10;

        $results = $repository->search($areaLevelOne, $page, $perPage);

        $response = [
            'tableColumns' => [
                'id' => '№',
                'region' => 'Идентификационен код',
                'name' => 'Име',
                'name_en' => 'Транслитерация',
                'nuts1' => 'NUTS1',
                'document' => 'Код на документа',
            ],
            'data' => $results,
            'filters' => [
                'region' => 'Идентификационен код',
                'name' => 'Име',
                'name_en' => 'Транслитерация',
                'nuts1' => 'NUTS1',
                'document' => 'Код на документа',
            ],
            'action' => 'areas-level-one',
        ];

        $this->view('home/areasLevelOne', $response);
    }

    /**
     * @param HTTPRequest $request
     * @return void
     */
    public function areasLevelTwo(HTTPRequest $request): void
    {
        $repository = new AreaLevelTwoRepository(DB::getInstance());
        $areaLevelTwo = new AreaLevelTwo();

        $page = intval($request->getInputByName('page'));
        $page = $page > 0 ? $page : 1;
        $perPage = intval($request->getInputByName('perPage'));
        $perPage = $perPage > 0 ? $perPage : 10;

        $results = $repository->search($areaLevelTwo, $page, $perPage);

        $response = [
            'tableColumns' => [
                'id' => '№',
                'region' => 'Идентификационен код',
                'name' => 'Име',
                'name_en' => 'Транслитерация',
                'nuts1' => 'NUTS1',
                'nuts2' => 'NUTS2',
                'document' => 'Код на документа',
            ],
            'data' => $results,
            'filters' => [
                'region' => 'Идентификационен код',
                'name' => 'Име',
                'name_en' => 'Транслитерация',
                'nuts1' => 'NUTS1',
                'nuts2' => 'NUTS2',
                'document' => 'Код на документа',
            ],
            'action' => 'areas-level-two',
        ];

        $this->view('home/areasLevelTwo', $response);
    }

    /**
     * @param HTTPRequest $request
     * @return void
     */
    public function documents(HTTPRequest $request): void
    {
        $repository = new DocumentRepository(DB::getInstance());
        $document = new Document();

        $page = intval($request->getInputByName('page'));
        $page = $page > 0 ? $page : 1;
        $perPage = intval($request->getInputByName('perPage'));
        $perPage = $perPage > 0 ? $perPage : 10;

        $results = $repository->search($document, $page, $perPage);

        $response = [
            'tableColumns' => [
                'id' => '№',
                'document' => 'Код на документа',
                'doc_kind' => 'Вид',
                'doc_name' => 'Име',
                'doc_name_en' => 'Транслитерация',
                'doc_inst' => 'Институция, издала документа',
                'doc_num' => 'Номер',
                'doc_date' => 'Дата на издаване на документа',
                'doc_act' => 'Дата на влизане в сила на документа',
                'dv_danni' => 'Брой на "Държавен вестник"',
                'dv_date' => 'Дата на издаване на вестника',
            ],
            'data' => $results,
            'filters' => [
                'document' => 'Код на документа',
                'doc_kind' => 'Вид',
                'doc_name' => 'Име',
                'doc_name_en' => 'Транслитерация',
                'doc_inst' => 'Институция, издала документа',
                'doc_num' => 'Номер',
                'doc_date' => 'Дата на издаване на документа',
                'doc_act' => 'Дата на влизане в сила на документа',
                'dv_danni' => 'Брой на "Държавен вестник"',
                'dv_date' => 'Дата на издаване на вестника',
            ],
            'action' => 'document',
        ];

        $this->view('home/documents', $response);
    }

    /**
     * @param HTTPRequest $request
     * @return void
     */
    public function municipalities(HTTPRequest $request): void
    {
        $repository = new MunicipalityRepository(DB::getInstance());
        $municipality = new Municipality();

        $page = intval($request->getInputByName('page'));
        $page = $page > 0 ? $page : 1;
        $perPage = intval($request->getInputByName('perPage'));
        $perPage = $perPage > 0 ? $perPage : 10;

        $results = $repository->search($municipality, $page, $perPage);

        $response = [
            'tableColumns' => [
                'id' => '№',
                'obshtina' => 'Код на общината',
                'ekatte' => 'Код на общинския център',
                'full_name_bul' => 'Име на общинския център',
                'name' => 'Име на общината',
                'name_en' => 'Транслитерация',
                'nuts1' => 'NUTS1',
                'nuts2' => 'NUTS2',
                'nuts3' => 'NUTS3',
                'category' => 'Категория на общината',
                'document' => 'Код на документа',
            ],
            'data' => $results,
            'filters' => [
                'obshtina' => 'Код на общината',
                'ekatte' => 'Код на общинския център',
                'full_name_bul' => 'Име на общинския център',
                'name' => 'Име на общината',
                'name_en' => 'Транслитерация',
                'nuts1' => 'NUTS1',
                'nuts2' => 'NUTS2',
                'nuts3' => 'NUTS3',
                'category' => 'Категория на общината',
                'document' => 'Код на документа',
            ],
            'action' => 'municipalities',
        ];

        $this->view('home/municipalities', $response);
    }

    /**
     * @param HTTPRequest $request
     * @return void
     */
    public function regions(HTTPRequest $request): void
    {
        $repository = new RegionRepository(DB::getInstance());
        $region = new Region();

        $page = intval($request->getInputByName('page'));
        $page = $page > 0 ? $page : 1;
        $perPage = intval($request->getInputByName('perPage'));
        $perPage = $perPage > 0 ? $perPage : 10;

        $results = $repository->search($region, $page, $perPage);

        $response = [
            'tableColumns' => [
                'id' => '№',
                'ekatte' => 'Код на областния център',
                'full_name_bul' => 'Име на областния център',
                'oblast' => 'Код на областта',
                'name' => 'Име на областта',
                'name_en' => 'Транслитерация',
                'nuts1' => 'NUTS1',
                'nuts2' => 'NUTS2',
                'nuts3' => 'NUTS3',
                'document' => 'Код на документа',
            ],
            'data' => $results,
            'filters' => [
                'ekatte' => 'Код на областния център',
                'full_name_bul' => 'Име на областния център',
                'oblast' => 'Код на областта',
                'name' => 'Име на областта',
                'name_en' => 'Транслитерация',
                'nuts1' => 'NUTS1',
                'nuts2' => 'NUTS2',
                'nuts3' => 'NUTS3',
                'document' => 'Код на документа',
            ],
            'action' => 'regions',
        ];

        $this->view('home/regions', $response);
    }

    /**
     * @param HTTPRequest $request
     * @return void
     */
    public function sofTerritorialUnits(HTTPRequest $request): void
    {
        $repository = new SofTerritorialUnitRepository(DB::getInstance());
        $sofTerritorialUnit = new SofTerritorialUnit();

        $page = intval($request->getInputByName('page'));
        $page = $page > 0 ? $page : 1;
        $perPage = intval($request->getInputByName('perPage'));
        $perPage = $perPage > 0 ? $perPage : 10;

        $results = $repository->search($sofTerritorialUnit, $page, $perPage);

        $response = [
            'tableColumns' => [
                'id' => '№',
                'ekatte' => 'ЕКАТТЕ',
                't_v_m' => 'Вид',
                'name' => 'Име',
                'name_en' => 'Транслитерация',
                'raion' => 'Идентификационен код на района',
                'kind' => 'Код на типа',
                'document' => 'Код на документа',
            ],
            'data' => $results,
            'filters' => [
                'ekatte' => 'ЕКАТТЕ',
                't_v_m' => 'Вид',
                'name' => 'Име',
                'name_en' => 'Транслитерация',
                'raion' => 'Идентификационен код на района',
                'kind' => 'Код на типа',
                'document' => 'Код на документа',
            ],
            'action' => 'sof-territorial-units',
        ];

        $this->view('home/sofTerritorialUnits', $response);
    }

    /**
     * @param HTTPRequest $request
     * @return void
     */
    public function territorialFormations(HTTPRequest $request): void
    {
        $repository = new TerritorialFormationsRepository(DB::getInstance());
        $territorialFormation = new TerritorialFormation();

        $page = intval($request->getInputByName('page'));
        $page = $page > 0 ? $page : 1;
        $perPage = intval($request->getInputByName('perPage'));
        $perPage = $perPage > 0 ? $perPage : 10;

        $results = $repository->search($territorialFormation, $page, $perPage);

        $response = [
            'tableColumns' => [
                'id' => '№',
                'ekatte' => 'ЕКАТТЕ',
                'kind' => 'Код на типа',
                'name' => 'Име',
                'name_en' => 'Транслитерация',
                'area1' => 'ЕКАТТЕ-код и наименование на населеното място или общината, в чието землище е селищното образувание',
                'area2' => 'ЕКАТТЕ-код и наименование на населеното място или общината, в чието землище е селищното образувание',
                'document' => 'Код на документа',
            ],
            'data' => $results,
            'filters' => [
                'ekatte' => 'ЕКАТТЕ',
                't_v_m' => 'Вид',
                'name' => 'Име',
                'name_en' => 'Транслитерация',
                'raion' => 'Идентификационен код на района',
                'kind' => 'Код на типа',
                'document' => 'Код на документа',
            ],
            'action' => 'territorial-formations',
        ];

        $this->view('home/territorialFormations', $response);
    }

    /**
     * @param HTTPRequest $request
     * @return void
     */
    public function territorialUnits(HTTPRequest $request): void
    {
        $repository = new TerritorialUnitRepository(DB::getInstance());
        $territorialUnit = new TerritorialUnit();

        $page = intval($request->getInputByName('page'));
        $page = $page > 0 ? $page : 1;
        $perPage = intval($request->getInputByName('perPage'));
        $perPage = $perPage > 0 ? $perPage : 10;

        $results = $repository->search($territorialUnit, $page, $perPage);

        $response = [
            'tableColumns' => [
                'id' => '№',
                'ekatte' => 'ЕКАТТЕ',
                't_v_m' => 'Вид',
                'name' => 'Име на населено място',
                'name_en' => 'Транслитерация',
                'oblast' => 'Код на областта',
                'oblast_name' => 'Име на областта',
                'obshtina' => 'Код на общината',
                'obshtina_name' => 'Име на общината',
                'kmetstvo' => 'Кметство',
                'nuts1' => 'NUTS1',
                'nuts2' => 'NUTS2',
                'nuts3' => 'NUTS3',
                'kind' => 'Код на типа',
                'category' => 'Код на категорията',
                'altitude' => 'Надморска височина',
                'abc' => 'Надморска височина стойност',
                'document' => 'Код на документа',
            ],
            'data' => $results,
            'filters' => [
                'ekatte' => 'ЕКАТТЕ',
                't_v_m' => 'Вид',
                'name' => 'Име на населено място',
                'name_en' => 'Транслитерация',
                'oblast' => 'Код на областта',
                'oblast_name' => 'Име на областта',
                'obshtina' => 'Код на общината',
                'obshtina_name' => 'Име на общината',
                'kmetstvo' => 'Кметство',
                'nuts1' => 'NUTS1',
                'nuts2' => 'NUTS2',
                'nuts3' => 'NUTS3',
                'kind' => 'Код на типа',
                'category' => 'Код на категорията',
                'altitude' => 'Надморска височина',
                'abc' => 'Надморска височина стойност',
                'document' => 'Код на документа',
            ],
            'action' => 'territorial-units',
        ];

        $this->view('home/territorialUnits', $response);
    }

    /**
     * @param HTTPRequest $request
     * @return void
     */
    public function townHalls(HTTPRequest $request): void
    {
        $repository = new TownHallRepository(DB::getInstance());
        $townHall = new TownHall();

        $page = intval($request->getInputByName('page'));
        $page = $page > 0 ? $page : 1;
        $perPage = intval($request->getInputByName('perPage'));
        $perPage = $perPage > 0 ? $perPage : 10;

        $results = $repository->search($townHall, $page, $perPage);

        $response = [
            'tableColumns' => [
                'id' => '№',
                'kmetstvo' => 'Идентификационен код',
                'name' => 'Име',
                'name_en' => 'Транслитерация',
                'ekatte' => 'ЕКАТТЕ-код на населеното място, център на кметството',
                'nuts1' => 'NUTS1',
                'nuts2' => 'NUTS2',
                'nuts3' => 'NUTS3',
                'document' => 'Код на документа',
                'category' => 'Категория',
            ],
            'data' => $results,
            'filters' => [
                'kmetstvo' => 'Идентификационен код',
                'name' => 'Име',
                'name_en' => 'Транслитерация',
                'ekatte' => 'ЕКАТТЕ-код на населеното място, център на кметството',
                'nuts1' => 'NUTS1',
                'nuts2' => 'NUTS2',
                'nuts3' => 'NUTS3',
                'document' => 'Код на документа',
                'category' => 'Категория',
            ],
            'action' => 'town-halls',
        ];

        $this->view('home/townHalls', $response);
    }

    /**
     * @param HTTPRequest $request
     * @return Area
     */
    public function getArea(HTTPRequest $request): Area
    {
        $area = new Area();

        if ($request->getInputByName('raion')) {
            $area->setRaion($request->getInputByName('raion'));
        }
        if ($request->getInputByName('name')) {
            $area->setName($request->getInputByName('name'));
        }
        if ($request->getInputByName('name_en')) {
            $area->setNameEn($request->getInputByName('name_en'));
        }
        if ($request->getInputByName('document')) {
            $area->setDocument($request->getInputByName('document') ?? 0);
        }

        return $area;
    }
}