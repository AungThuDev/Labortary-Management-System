<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Media;
use App\Models\Advisor;
use App\Models\Project;
use App\Models\Subject;
use App\Models\Principle;
use App\Models\Publication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::count();
        $principle = Principle::count();
        $project = Project::count();
        $advisor = Advisor::count();
        $subject = Subject::count();
        $event = Media::count();
        $publication = Publication::count();
        $currentMemberCount = getCurrentMemberCount();
        $formerMember = getFormerMemberCount();
        return view('backend.dashboard.index',compact('user','project','advisor','subject','currentMemberCount','formerMember','event','principle','publication'));
    }
}
