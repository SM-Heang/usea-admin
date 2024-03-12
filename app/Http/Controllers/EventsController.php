<?php

namespace App\Http\Controllers;
use DOMDocument;
use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{


    public function index()
    {
        $events = Event::paginate(15);
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {

        $description_en = $request->event_title_en;

        $dom = new DOMDocument();
        $dom->loadHTML($description_en,9);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $data = base64_decode(explode(',',explode(';',$img->getAttribute('src'))[1])[1]);
            $image_name = "/upload/" . time(). $key.'.png';
            file_put_contents(public_path().$image_name,$data);
            $img->removeAttribute('src');
            $img->setAttribute('src',$image_name);
        }
        $description_en = $dom->saveHTML();

        $event = new Event;
        $event->user_id = auth()->id();
        $event->event_title_en = $request->input('event_title_en');
        $event->event_title_kh = $request->input('event_title_kh');
        $event->event_date = $request->input('event_date');

        if ($request->hasFile('event_cover')) {
            $file = $request->file('event_cover');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('../../usea-edu.kh/media/events/', $filename);
            $event->event_cover = $filename;
        } else {
            $event->event_cover = '';
        }

        $event->event_description_en = $description_en;
        $event->event_description_kh = $request->input('event_description_kh');
        $event->event_status = $request->input('event_status');
        $event->save();

        return redirect()->route('events.index')->with('status', 'Event Added Successfully');
    } catch (\Exception $e) {
        // Handle the exception here
        return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $events = Event::findOrFail($id);
        return view('events.edit', ['events' => $events]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);
        $event->user_id = auth()->id();
        $event->event_title_en = $request -> input('event_title_en');
        $event->event_title_kh = $request -> input('event_title_kh');
        $event->event_date = $request -> input('event_date');
        if($request->hasfile('event_cover')){
            $file = $request->file('event_cover');
            $extension = $file->getClientOriginalExtension();
            // $filename = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move('../../usea-edu.kh/media/events/', $filename);
            $event->event_cover = $filename;
        }else{
            return $request;
            $event->event_cover = '';
        }
        // $event->event_cover = $request -> input('event_cover');
        $event->event_description_en = $request -> input('event_description_en');
        $event->event_description_kh = $request -> input('event_description_kh');
        $event->event_status = $request -> input('event_status');
        // $event->event_style = $request -> input('event_style');
        // $event->tags = $request -> input('tag');
        $event->save();
        return redirect()->route('events.index')->with('status', 'Event Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $events = Event::findOrFail($id);
        $events->delete();
        return redirect()->route('events.index')->with('delete', 'Event Deleted');
    }
}
