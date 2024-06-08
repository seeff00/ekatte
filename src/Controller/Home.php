<?php

namespace App\Controller;

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
use App\Utils\Common;
use Exception;

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
     * Areas action handler.
     *
     * @param HTTPRequest $request
     * @return void
     */
    public function areas(HTTPRequest $request): void
    {
        $page = intval($request->inputs('page'));
        $page = $page > 0 ? $page : 1;
        $perPage = intval($request->inputs('perPage'));
        $perPage = $perPage > 0 ? $perPage : 100;

        $clearedInputs = Common::clearArray($request->inputs());
        unset($clearedInputs['page']);
        unset($clearedInputs['perPage']);

        try {
            $repository = new AreaRepository(DB::getInstance());
            $results = $repository->search($clearedInputs, $page, $perPage);

            $response = [
                'tableColumns' => [
                    'id' => '№',
                    'raion' => 'Идентификационен код',
                    'name' => 'Име',
                    'name_en' => 'Транслитерация',
                    'document' => 'Код на документа',
                ],
                'tableRows' => $results,
                'filters' => [
                    'raion' => 'Идентификационен код',
                    'name' => 'Име',
                    'name_en' => 'Транслитерация',
                    'document' => 'Код на документа',
                ],
                'action' => 'areas',
            ];

            $this->view('home/areas', $response);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Areas Level One action handler.
     *
     * @param HTTPRequest $request
     * @return void
     */
    public function areasLevelOne(HTTPRequest $request): void
    {
        $page = intval($request->inputs('page'));
        $page = $page > 0 ? $page : 1;
        $perPage = intval($request->inputs('perPage'));
        $perPage = $perPage > 0 ? $perPage : 100;

        $clearedInputs = Common::clearArray($request->inputs());
        unset($clearedInputs['page']);
        unset($clearedInputs['perPage']);

        try {
            $repository = new AreaLevelOneRepository(DB::getInstance());
            $results = $repository->search($clearedInputs, $page, $perPage);

            $response = [
                'tableColumns' => [
                    'id' => '№',
                    'region' => 'Идентификационен код',
                    'name' => 'Име',
                    'name_en' => 'Транслитерация',
                    'nuts1' => 'NUTS1',
                    'document' => 'Код на документа',
                ],
                'tableRows' => $results,
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
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Areas Level Two action handler.
     *
     * @param HTTPRequest $request
     * @return void
     */
    public function areasLevelTwo(HTTPRequest $request): void
    {
        $page = intval($request->inputs('page'));
        $page = $page > 0 ? $page : 1;
        $perPage = intval($request->inputs('perPage'));
        $perPage = $perPage > 0 ? $perPage : 100;

        $clearedInputs = Common::clearArray($request->inputs());
        unset($clearedInputs['page']);
        unset($clearedInputs['perPage']);

        try {
            $repository = new AreaLevelTwoRepository(DB::getInstance());
            $results = $repository->search($clearedInputs, $page, $perPage);

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
                'tableRows' => $results,
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
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Documents action handler.
     *
     * @param HTTPRequest $request
     * @return void
     */
    public function documents(HTTPRequest $request): void
    {
        $page = intval($request->inputs('page'));
        $page = $page > 0 ? $page : 1;
        $perPage = intval($request->inputs('perPage'));
        $perPage = $perPage > 0 ? $perPage : 100;

        $clearedInputs = Common::clearArray($request->inputs());
        unset($clearedInputs['page']);
        unset($clearedInputs['perPage']);

        try {
            $repository = new DocumentRepository(DB::getInstance());
            $results = $repository->search($clearedInputs, $page, $perPage);

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
                'tableRows' => $results,
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
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Municipalities action handler.
     *
     * @param HTTPRequest $request
     * @return void
     */
    public function municipalities(HTTPRequest $request): void
    {
        $page = intval($request->inputs('page'));
        $page = $page > 0 ? $page : 1;
        $perPage = intval($request->inputs('perPage'));
        $perPage = $perPage > 0 ? $perPage : 100;

        $clearedInputs = Common::clearArray($request->inputs());
        unset($clearedInputs['page']);
        unset($clearedInputs['perPage']);

        try {
            $repository = new MunicipalityRepository(DB::getInstance());
            $results = $repository->search($clearedInputs, $page, $perPage);

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
                'tableRows' => $results,
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
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Regions action handler.
     *
     * @param HTTPRequest $request
     * @return void
     */
    public function regions(HTTPRequest $request): void
    {
        $page = intval($request->inputs('page'));
        $page = $page > 0 ? $page : 1;
        $perPage = intval($request->inputs('perPage'));
        $perPage = $perPage > 0 ? $perPage : 100;

        $clearedInputs = Common::clearArray($request->inputs());
        unset($clearedInputs['page']);
        unset($clearedInputs['perPage']);

        try {
            $repository = new RegionRepository(DB::getInstance());
            $results = $repository->search($clearedInputs, $page, $perPage);

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
                'tableRows' => $results,
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
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Sof Territorial Units action handler.
     *
     * @param HTTPRequest $request
     * @return void
     */
    public function sofTerritorialUnits(HTTPRequest $request): void
    {
        $page = intval($request->inputs('page'));
        $page = $page > 0 ? $page : 1;
        $perPage = intval($request->inputs('perPage'));
        $perPage = $perPage > 0 ? $perPage : 100;

        $clearedInputs = Common::clearArray($request->inputs());
        unset($clearedInputs['page']);
        unset($clearedInputs['perPage']);

        try {
            $repository = new SofTerritorialUnitRepository(DB::getInstance());
            $results = $repository->search($clearedInputs, $page, $perPage);

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
                'tableRows' => $results,
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
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Territorial Formations action handler.
     *
     * @param HTTPRequest $request
     * @return void
     */
    public function territorialFormations(HTTPRequest $request): void
    {
        $page = intval($request->inputs('page'));
        $page = $page > 0 ? $page : 1;
        $perPage = intval($request->inputs('perPage'));
        $perPage = $perPage > 0 ? $perPage : 100;

        $clearedInputs = Common::clearArray($request->inputs());
        unset($clearedInputs['page']);
        unset($clearedInputs['perPage']);

        try {
            $repository = new TerritorialFormationsRepository(DB::getInstance());
            $results = $repository->search($clearedInputs, $page, $perPage);

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
                'tableRows' => $results,
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
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Territorial Units action handler.
     *
     * @param HTTPRequest $request
     * @return void
     */
    public function territorialUnits(HTTPRequest $request): void
    {
        $page = intval($request->inputs('page'));
        $page = $page > 0 ? $page : 1;
        $perPage = intval($request->inputs('perPage'));
        $perPage = $perPage > 0 ? $perPage : 100;

        $clearedInputs = Common::clearArray($request->inputs());
        unset($clearedInputs['page']);
        unset($clearedInputs['perPage']);

        try {
            $repository = new TerritorialUnitRepository(DB::getInstance());
            $results = $repository->search($clearedInputs, $page, $perPage);

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
                'tableRows' => $results,
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
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Town Halls action handler.
     *
     * @param HTTPRequest $request
     * @return void
     */
    public function townHalls(HTTPRequest $request): void
    {
        $page = intval($request->inputs('page'));
        $page = $page > 0 ? $page : 1;
        $perPage = intval($request->inputs('perPage'));
        $perPage = $perPage > 0 ? $perPage : 100;

        $clearedInputs = Common::clearArray($request->inputs());
        unset($clearedInputs['page']);
        unset($clearedInputs['perPage']);

        try {
            $repository = new TownHallRepository(DB::getInstance());
            $results = $repository->search($clearedInputs, $page, $perPage);

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
                'tableRows' => $results,
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
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}