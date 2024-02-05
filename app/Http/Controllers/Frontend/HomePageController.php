<?php

namespace App\Http\Controllers\Frontend;


use Log;
use App\Models\Media;
use App\Models\Member;
use App\Models\Advisor;
use App\Models\Project;
use App\Models\Subject;
use App\Models\Research;
use Jorenvh\Share\Share;
use App\Models\Principle;
use App\Models\Publication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;


class HomePageController extends Controller
{
    public function index()
    {
        $advisors = Advisor::all();
        $principles = Principle::all();
        return view('frontend.index', compact('advisors', 'principles'));
    }
    public function members()
    {
        $member_status = Config::get('members.member_status');
        $status = array_flip($member_status);
        $members = Member::with('research')->where('status', 1)->paginate(9)->fragment('members');
        $formermembers = Member::with('research')->where('status', 2)->take(4)->get();
        return view('frontend.members', compact('members', 'formermembers'));
    }
    public function former()
    {
        $member_status = Config::get('members.member_status');
        $status = array_flip($member_status);
        $formermembers = Member::with('research')->where('status', 2)->paginate(9);
        $members = Member::with('research')->where('status', 1)->take(4)->get();
        return view('frontend.formermembers', compact('formermembers', 'members'));
    }
    public function memberdetail($id)
    {
        $member_status = Config::get('members.member_status');
        $status = array_flip($member_status);
        $formermembers = Member::with('research')->where('status', 2)->take(4)->get();
        $member = Member::findOrFail($id);
        return view('frontend.detail', compact('member', 'formermembers'));
    }
    public function formerdetail($id)
    {
        $member_status = Config::get('members.member_status');
        $status = array_flip($member_status);
        $activemembers = Member::with('research')->where('status', 1)->take(4)->get();
        $member = Member::findOrFail($id);
        return view('frontend.formerdetail', compact('member', 'activemembers'));
    }
    public function research()
    {
        $researches = Research::latest()->paginate(8);

        return view('frontend.research', compact('researches'));
    }
    public function publication()
    {
        $publications = Publication::latest()->paginate(5)->fragment('pub');
        return view('frontend.publication', compact('publications'));
    }
    public function lab()
    {
        $projects = Project::latest()->paginate(8)->fragment('lab');
        return view('frontend.lab', compact('projects'));
    }
    public function subject()
    {
        $subjects = Subject::latest()->paginate(5)->fragment('sub');
        return view('frontend.subject', compact('subjects'));
    }
    public function event()
    {
        $events = Media::latest()->paginate(6)->fragment('news');
        $medias = Media::latest()->take(4)->get();
        return view('frontend.event', compact('events', 'medias'));
    }
    public function detail($id)
    {

        $shareInstance = new Share();
        $sharefacebook = $shareInstance->currentPage()->facebook();
        $shareInstancetwitter = new Share();
        $sharetwitter = $shareInstancetwitter->currentPage()->twitter();
        $shareteInstancetelegram = new Share();
        $sharetelegram = $shareteInstancetelegram->currentPage()->telegram();
        $event = Media::findOrFail($id);
        $medias = Media::latest()->take(4)->get();
        return view('frontend.eventdetail', compact('event', 'medias','sharefacebook','sharetwitter','sharetelegram'));
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function searchactivemember(Request $request)
    {
        $search_text = $request->input('search');

        $member_status = Config::get('members.member_status');
        $status = array_flip($member_status);
        $members = Member::where('status', 1)->where('name', 'LIKE', '%' . $search_text . '%')->get();
        $formermembers = Member::with('research')->where('status', 2)->take(4)->get();
        return view('frontend.searchactive', compact('members', 'formermembers'));
    }
    public function searchformermember(Request $request)
    {
        $search_text = $request->input('search');

        $member_status = Config::get('members.member_status');
        $status = array_flip($member_status);
        $formermembers = Member::where('status', 2)->where('name', 'LIKE', '%' . $search_text . '%')->get();
        $activemembers = Member::with('research')->where('status', 1)->take(4)->get();
        return view('frontend.searchformer', compact('formermembers', 'activemembers'));
    }
    public function searchresearch(Request $request)
    {
        $search_text = $request->input('search');

        $researches = Research::where('name', 'LIKE', '%' . $search_text . '%')->get();
        return view('frontend.searchresearch', compact('researches'));
    }
    public function searchpub(Request $request)
    {
        $search_text = $request->input('search');

        $publications = Publication::where('name', 'LIKE', '%' . $search_text . '%')->get();
        return view('frontend.searchpublication', compact('publications'));
    }
    public function searchsub(Request $request)
    {
        $search_text = $request->input('search');

        $subjects = Subject::where('course_name', 'LIKE', '%' . $search_text . '%')->get();
        return view('frontend.searchsubject', compact('subjects'));
    }
    public function searchevent(Request $request)
    {
        $search_text = $request->input('search');

        $events = Media::where('title', 'LIKE', '%' . $search_text . '%')->get();
        $medias = Media::latest()->take(4)->get();
        return view('frontend.searchevent', compact('events', 'medias'));
    }
    public function store(Request $request)
    {
        try {
            //Your validation logic goes here
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'subject' => 'required',
                'message' => 'required',
                'g-recaptcha-response' => 'required'
            ]);



            if ($validator->fails()) {
                // If validation fails, return JSON response with errors
                return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
            } else {
                if ($this->isOnline()) {
                    $mail_data = [
                        'recipient' => 'kosawlinoo@gmail.com',
                        'recipientName' => "Dr.Saw Lin Oo",
                        'fromEmail' => $request->email,
                        'fromName' => $request->name,
                        'phone' => $request->phone,
                        'subject' => $request->subject,
                        'body' => $request->message
                    ];
                    Mail::send('template', $mail_data, function ($message) use ($mail_data) {
                        $message->from($mail_data['fromEmail'], $mail_data['fromName'])
                            ->to($mail_data['recipient'])
                            ->subject($mail_data['subject']);
                    });
                    return response()->json(['status' => 1, 'msg' => 'Thank You for contacting us!']);
                } else {
                    return response()->json(['status' => 1, 'msg' => 'No Internet Connection']);
                }
            }
        } catch (\Exception $e) {
            Log::error('Exception: ' . $e->getMessage());
            return response()->json(['status' => 0, 'msg' => 'Internal Server Error']);
        }
    }
    public function isOnline($site = "https://www.youtube.com/")
    {
        if (@fopen($site, "r")) {
            return true;
        } else {
            return false;
        }
    }
}
