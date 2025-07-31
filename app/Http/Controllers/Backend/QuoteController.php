<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Quote;
use DataTables;
use Spatie\Sitemap\Sitemap;


class QuoteController extends Controller
{
    public function AllQuote(Request $request){
        if($request->ajax()){
            $data = Quote::latest()->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $edit_route = route('edit.quote', $row->id);
                $delete_route = route('delete.quote', $row->id);
                $action = '<a href="'.$edit_route.'" class="btn btn-primary">Edit</a> ';
                $action .= '<a href="'.$delete_route.'" id="delete" class="btn btn-danger">Delete</a> ';
                $action .= '<a href="'.url('/quote/'.$row->quote_slug).'" class="btn btn-success">Show</a>';
                return $action;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('backend.quote.all_quote');

        // $quote = Quote::get();
        // return view('backend.quote.all_quote', compact('quote'));
    }

    public function AddQuote(){
        return view('backend.quote.add_quote');
    }

    public function ShowQuote($slug){
        $quote = Quote::where('quote_slug', $slug)->first();           
        return view('pages.quotepage', compact('quote'));
    }

    public function Quote(){
        $quotes = Quote::paginate(20);
        return view('pages.quotes', compact('quotes'));
    }

    public function StoreQuote(Request $request){
        $request->validate([
            'quote' => 'required|unique:quotes',
            'quote_by' => 'required'
        ]);

        $data = $request->all();
        
        $data['quote_slug'] = Str::slug($request->quote, "-");

        $insert_quote = Quote::create($data);

        $notification = array(
            'message' => 'Quote Added Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.quote');
    }

    public function EditQuote($id){
        $quote = Quote::findOrFail($id);
        return view('backend.quote.edit_quote', compact('quote'));
    }

    public function UpdateQuote(Request $request){
        $request->validate([
            'quote' => 'required|unique:quotes',
            'quote_by' => 'required'
        ]);

        $data = $request->all();
        
        $data['quote_slug'] = Str::slug($request->quote, "-");

        $insert_quote = Quote::findOrFail($request->id)->update($data);

        $notification = array(
            'message' => 'Quote Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.quote');
    }

    public function DeleteQuote($id){
        Quote::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Quote Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function BulkQuote(){
        // Manually create sitemap
        $sitemap = Sitemap::create();

        // Static pages
        $sitemap->add('/');

        // Dynamic pages
        $Quote = Quote::all();
        foreach ($Quote as $q) {
            $sitemap->add(url("/quote/".$q->quote_slug));
        }

        $sitemap->writeToFile(public_path('quote_sitemap.xml'));
        
        $quote_list = [
 "John Keats" => "I love you the more in that I believe you had liked me for my own sake and for nothing else.",
 "Ernest Hemingway" => "But man is not made for defeat. A man can be destroyed but not defeated.",
 "Franklin D. Roosevelt" => "When you reach the end of your rope, tie a knot in it and hang on.",
 "Heraclitus" => "There is nothing permanent except change.",
 "Indira Gandhi" => "You cannot shake hands with a clenched fist.",
 "A. P. J. Abdul Kalam" => "Let us sacrifice our today so that our children can have a better tomorrow.",
 "Niccolo Machiavelli" => "It is better to be feared than loved, if you cannot be both.",
 "Henry James" => "Do not mind anything that anyone tells you about anyone else. Judge everyone and everything for yourself.",
 "Leonardo da Vinci" => "Learning never exhausts the mind.",
 "Jane Austen" => "There is no charm equal to tenderness of heart.",
 "Edgar Allan Poe" => "All that we see or seem is but a dream within a dream.",
 "Francis of Assisi" => "Lord, make me an instrument of thy peace. Where there is hatred, let me sow love.",
 "Rainer Maria Rilke" => "The only journey is the one within.",
 "Will Rogers" => "Good judgment comes from experience, and a lot of that comes from bad judgment.",
 "William Blake" => "Think in the morning. Act in the noon. Eat in the evening. Sleep in the night.",
 "Khalil Gibran" => "Life without love is like a tree without blossoms or fruit.",
 "Aesop" => "No act of kindness, no matter how small, is ever wasted.",
 "Karl A. Menninger" => "Love cures people - both the ones who give it and the ones who receive it.",
 "Satchel Paige" => "Work like you don't need the money. Love like you've never been hurt. Dance like nobody's watching.",
 "George Washington" => "It is far better to be alone, than to be in bad company.",
 "Napoleon Hill" => "If you cannot do great things, do small things in a great way.",
 "Susan B. Anthony" => "Independence is happiness.",
 "Sun Tzu" => "The supreme art of war is to subdue the enemy without fighting.",
 "Walt Whitman" => "Keep your face always toward the sunshine - and shadows will fall behind you.",
 "Sigmund Freud" => "Being entirely honest with oneself is a good exercise.",
 "George Orwell" => "Happiness can exist only in acceptance.",
 "John Galsworthy" => "Love has no age, no limit; and no death.",
 "Albert Einstein" => "You can't blame gravity for falling in love.",
 "Aldous Huxley" => "There is only one corner of the universe you can be certain of improving, and that's your own self.",
 "Thomas Jefferson" => "Honesty is the first chapter in the book of wisdom.",
 "Lao Tzu" => "The journey of a thousand miles begins with one step.",
 "H. Jackson Brown, Jr." => "The best preparation for tomorrow is doing your best today.",
 "Jesus Christ" => "A new command I give you: Love one another. As I have loved you, so you must love one another.",
 "Edith Wharton" => "There are two ways of spreading light: to be the candle or the mirror that reflects it.",
 "Samuel Beckett" => "Ever tried. Ever failed. No matter. Try Again. Fail again. Fail better.",
 "Voltaire" => "God gave us the gift of life; it is up to us to give ourselves the gift of living well.",
 "Edward Everett Hale" => "Coming together is a beginning; keeping together is progress; working together is success.",
 "Simone de Beauvoir" => "Change your life today. Don't gamble on the future, act now, without delay.",
 "J. R. R. Tolkien" => "Not all those who wander are lost.",
 "Anne Frank" => "Whoever is happy will make others happy too.",
 "Thomas A. Edison" => "I have not failed. I've just found 10,000 ways that won't work.",
 "Benjamin Franklin" => "Tell me and I forget. Teach me and I remember. Involve me and I learn.",
 "Thomas Aquinas" => "There is nothing on this earth more to be prized than true friendship.",
 "John C. Maxwell" => "A leader is one who knows the way, goes the way, and shows the way.",
 "Marcus Aurelius" => "Very little is needed to make a happy life; it is all within yourself, in your way of thinking.",
 "George Sand" => "There is only one happiness in this life, to love and be loved.",
 "Milton Berle" => "If opportunity doesn't knock, build a door.",
 "Mark Twain" => "The secret of getting ahead is getting started.",
 "Marcel Proust" => "Let us be grateful to people who make us happy, they are the charming gardeners who make our souls blossom.",
 "Margaret Mead" => "Always remember that you are absolutely unique. Just like everyone else.",
 "Plato" => "The beginning is the most important part of the work.",
 "Thomas Paine" => "The World is my country, all mankind are my brethren, and to do good is my religion.",
 "Viktor E. Frankl" => "When we are no longer able to change a situation - we are challenged to change ourselves.",
 "Robert H. Schuller" => "Problems are not stop signs, they are guidelines.",
 "Plutarch" => "What we achieve inwardly will change outer reality.",
 "Mother Teresa" => "Spread love everywhere you go. Let no one ever come to you without leaving happier.",
 "Friedrich Nietzsche" => "We love life, not because we are used to living but because we are used to loving.",
 "Walt Disney" => "All our dreams can come true, if we have the courage to pursue them.",
 "William Shakespeare" => "We know what we are, but know not what we may be.",
 "Henry David Thoreau" => "It's not what you look at that matters, it's what you see.",
 "Leo Buscaglia" => "A single rose can be my garden... a single friend, my world.",
 "Euripides" => "Friends show their love in times of trouble, not in happiness.",
 "Desmond Tutu" => "You don't choose your family. They are God's gift to you, as you are to them.",
 "Soren Kierkegaard" => "Life is not a problem to be solved, but a reality to be experienced.",
 "George Bernard Shaw" => "Life isn't about finding yourself. Life is about creating yourself.",
 "Socrates" => "The only true wisdom is in knowing you know nothing.",
 "Confucius" => "Everything has beauty, but not everyone sees it.",
 "Ingrid Bergman" => "A kiss is a lovely trick designed by nature to stop speech when words become superfluous.",
 "Judy Garland" => "For it was not into my ear you whispered, but into my heart. It was not my lips you kissed, but my soul.",
 "A. A. Milne" => "If you live to be a hundred, I want to live to be a hundred minus one day so I never have to live without you.",
 "John F. Kennedy" => "As we express our gratitude, we must never forget that the highest appreciation is not to utter words, but to live by them.",
 "Theodore Roosevelt" => "Believe you can and you're halfway there.",
 "Democritus" => "Happiness resides not in possessions, and not in gold, happiness dwells in the soul.",
 "William Arthur Ward" => "The pessimist complains about the wind; the optimist expects it to change; the realist adjusts the sails.",
 "Eleanor Roosevelt" => "The future belongs to those who believe in the beauty of their dreams.",
 "Nelson Mandela" => "Education is the most powerful weapon which you can use to change the world.",
 "Norman Vincent Peale" => "Change your thoughts and you change your world.",
 "Robert Frost" => "In three words I can sum up everything I've learned about life: it goes on.",
 "Loretta Young" => "Love isn't something you find. Love is something that finds you.",
 "Albert Camus" => "Blessed are the hearts that can bend; they shall never be broken.",
 "Og Mandino" => "Do all things with love.",
 "Winston Churchill" => "No one can guarantee success in war, but only deserve it.",
 "Muriel Strode" => "I will not follow where the path may lead, but I will go where there is no path, and I will leave a trail.",
 "Aristotle" => "Love is composed of a single soul inhabiting two bodies.",
 "Mahatma Gandhi" => "Where there is love there is life.",
 "Lucius Annaeus Seneca" => "One of the most beautiful qualities of true friendship is to understand and to be understood.",
 "Edmund Burke" => "The only thing necessary for the triumph of evil is for good men to do nothing.",
 "Buddha" => "Do not dwell in the past, do not dream of the future, concentrate the mind on the present moment.",
 "Robert Louis Stevenson" => "Don't judge each day by the harvest you reap but by the seeds that you plant.",
 "Joseph Campbell" => "Find a place inside where there's joy, and the joy will burn out the pain.",
 "Maya Angelou" => "Try to be a rainbow in someone's cloud.",
 "Aristotle Onassis" => "It is during our darkest moments that we must focus to see the light.",
 "Oscar Wilde" => "Keep love in your heart. A life without it is like a sunless garden when the flowers are dead.",
 "Helen Keller" => "The best and most beautiful things in the world cannot be seen or even touched - they must be felt with the heart."
 ];

        foreach ($quote_list as $k => $items) {            
            $quote = $items;
            $quote_by = $k;
            $quote_slug = Str::slug($quote, "-");
            $data['quote'] = $quote;
            $data['quote_slug'] = $quote_slug;
            $data['quote_by'] = $quote_by;


            $check_quote = Quote::where('quote_slug', $quote_slug)->first();

            if(empty($check_quote)){
                echo "<pre>";
                print_r($data);
                echo "</pre>";
                $insert_quote = Quote::create($data);
            }
        }
    }
}
