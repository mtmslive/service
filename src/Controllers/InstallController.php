<?php
namespace Mtms\Service\Controllers;

use App\Http\Controllers\Controller;
use Mtms\Service\Requests\InstallRequest;
use Mtms\Service\Repositories\InstallRepository;

class InstallController extends Controller
{
    protected $repo;

    /**
     * Instantiate a new controller instance.
     */
    public function __construct(
        InstallRepository $repo
    ) {
        $this->repo = $repo;
    }

    /**
     * Force migrate
     */
    public function forceMigrate() {
        return $this->ok($this->repo->forceMigrate());
    }

    /**
     * Used to get pre requisites of server and folder
     */
    public function preRequisite()
    {
        return $this->ok($this->repo->getPreRequisite());
    }

    /**
     * Used to install the application
     */
    public function store(InstallRequest $request)
    {
        $this->repo->validateDatabase();

        if (in_array(request()->query('option'), ['database', 'admin', 'access_code'])) {
            return $this->success([]);
        }

        $this->repo->install();

        return $this->success(['message' => trans('setup.install.completed')]);
    }
}