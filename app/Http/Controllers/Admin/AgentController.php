<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

// Services
use App\Services\AgentServices;

class AgentController extends Controller
{
    private $agent;

    public function __construct(AgentServices $agent)
    {
        $this->agent = $agent;
    }

    // Submit new agent
    public function submitAgent()
    {
        $request = \Request::all();
        unset($request['_token']);
        $data = $this->agent->addAgent($request);

        return redirect('new-agent')
                    ->with('status', $data['status'])
                    ->with('message', $data['message']);
    }


    // Display agent form
    public function agentForm()
    {
        $data = [
            "header" => "Agent Form",
            "title" => "Agent Form",
            "agents" => $this->agent->getAgents()
        ];

        return view('admin.agent.create-agent', compact('data'));
    }

    // Display agents
    public function agents()
    {
        $agents = $this->agent->getDataList();
        $data = [
            "header" => "Agents",
            "title" => "Agents",
            "agents" => $agents
        ];

        return view('admin.agent.agents', compact('data'));
    }
}

