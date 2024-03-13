<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $description_en = $request->input('event_description_en');
        $dom = new \DOMDocument();
        $dom->loadHTML(mb_convert_encoding($description_en, 'HTML-ENTITIES', 'UTF-8'));

        $images = $dom->getElementsByTagName('img');

        $base_url = url('http://localhost/usea-admin-1/public/'); // Get the base URL of your application

        foreach ($images as $k => $img) {
            $image_64 = $img->getAttribute('src');
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);

            $imageName = Str::random(10) . '.' . $extension;
            $image_name = "/uploads/" . $imageName;
            $path = public_path() . $image_name;
            file_put_contents($path, base64_decode($image));

            // Prepend the base URL to the image path
            $image_url = $base_url . $image_name;

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_url);
        }

        $description_en = $dom->saveHTML();



        $description_kh = $request->input('event_description_kh');
        $dom_kh = new \DomDocument();

        $dom_kh->loadHTML(mb_convert_encoding($description_kh, 'HTML-ENTITIES', 'UTF-8'));

        $images_kh = $dom_kh->getElementsByTagName('img');
        $base_url = url('http://localhost/usea-admin-1/public/'); // Get the base URL of your application

        foreach ($images_kh as $k => $img) {
            $image_64 = $img->getAttribute('src');
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);

            $imageName = Str::random(10) . '.' . $extension;
            $image_name = "/uploads/" . $imageName;
            $path = public_path() . $image_name;
            file_put_contents($path, base64_decode($image));

            // Prepend the base URL to the image path
            $image_url = $base_url . $image_name;

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_url);
        }

        $description_kh = $dom->saveHTML();

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
        $event->event_description_kh = $description_kh;
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
        $description_en = $request->input('event_description_en');
        $dom = new \DOMDocument();
        $dom->loadHTML(mb_convert_encoding($description_en, 'HTML-ENTITIES', 'UTF-8'));

        $images = $dom->getElementsByTagName('img');

        $base_url = url('http://localhost/usea-admin-1/public/'); // Get the base URL of your application

        foreach ($images as $k => $img) {
            $image_64 = $img->getAttribute('src');
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);

            $imageName = Str::random(10) . '.' . $extension;
            $image_name = "/uploads/" . $imageName;
            $path = public_path() . $image_name;
            file_put_contents($path, base64_decode($image));

            // Prepend the base URL to the image path
            $image_url = $base_url . $image_name;

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_url);
        }

        $description_en = $dom->saveHTML();



        $description_kh = $request->input('event_description_kh');
        $dom_kh = new \DomDocument();

        $dom_kh->loadHTML(mb_convert_encoding($description_kh, 'HTML-ENTITIES', 'UTF-8'));

        $images_kh = $dom_kh->getElementsByTagName('img');
        $base_url = url('http://localhost/usea-admin-1/public/'); // Get the base URL of your application

        foreach ($images_kh as $k => $img) {
            $image_64 = $img->getAttribute('src');
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);

            $imageName = Str::random(10) . '.' . $extension;
            $image_name = "/uploads/" . $imageName;
            $path = public_path() . $image_name;
            file_put_contents($path, base64_decode($image));

            // Prepend the base URL to the image path
            $image_url = $base_url . $image_name;

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_url);
        }

        $description_kh = $dom->saveHTML();

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
        $event->event_description_en = $description_en;
        $event->event_description_kh = $description_kh;
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
