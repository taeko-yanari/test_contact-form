<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {

    $categories = Category::all();
    $contact = [];

    return view('index', compact('contact', 'categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only([
            'last_name',
            'first_name',
            'category_id',
            'gender',
            'email',
            'address',
            'building',
            'detail'
            ]);

            $contact['tel'] = $request->tel[1] . $request->tel[2] . $request->tel[3];
            $contact['tel1'] = $request->tel[1];
            $contact['tel2'] = $request->tel[2];
            $contact['tel3'] = $request->tel[3];

            $category = Category::find($contact['category_id']);
            $contact['category_name'] = $category->content;

            return view('confirm', compact('contact', 'category'));
    }

    public function store(ContactRequest $request)
    {
        if($request->action === 'back') {
            return redirect()
            ->route('index')
            ->withInput();
            }

            $tel = $request->tel[1] . $request->tel[2] . $request->tel[3];

            $contact = $request->only(['last_name', 'first_name','category_id', 'gender', 'email', 'address', 'building', 'detail']);

            $contact['tel'] = $tel;

            Contact::create($contact);

            return view('thanks');
    }

}
