<?php


class Post{
    private string $message;
    private array|string $images;
    private string $date;
    private string $id;

    public function __construct(string $message, array|string $images, string $date){
        $this->setId();
        $this->message = $message;
        $this->images = $images;
        $this->date = $date;
    }
    
    // -------------- GETTERS
    public function getId():string
    {
        return $this->id;
    }

    public function getMessage():string
    {
        return $this->message;
    }

    public function getImages():string|array
    {
        if(empty($this->images)){$this->images[] = "logo.png";}
        return $this->images;
    }

    public function getDate():string
    {
        return $this->date;
    }

    // -------------- SETTERS
    public function setId():void
    {
        $this->id = bin2hex(random_bytes(8));
    }

    public function setMessage(string $message):void
    {
        $this->message = $message;
    }

    public function setImages(string|array $images):void
    {
        $this->images = $images;
    }

    public function setDate(string $date):void
    {
        $this->date = $date;
    }

    // ----------- METHODS

    public function getPostCard():string
    {
        $width = "400px";
        $small = "w-[300px]";
        $w = "sm:w-[$width]";
        $hasSlider = isset($this->images[1]) ? true : false;
        ob_start() ?>
            <article id="post-<?=$this->id?>" class="post-card <?=$small?> <?=$w?> border relative h-[500px]">
                <?php
                    if($hasSlider){ ?>
                        <div class="absolute left-2 top-0 h-3/5 grid place-items-center z-10">
                            <button class="prev-image text-white font-bold text-xl"><i class="fa fa-chevron-left"></i></button>
                        </div>
                    <?php }
                ?>
                <div class="slider-container flex <?=$small?> <?=$w?> h-3/5 overflow-hidden scroll-smooth relative">
                    <?php         
                        foreach($this->getImages() as $image){ ?>
                            <img src='<?=$image?>' class="post-image object-cover <?=$small?> <?=$w?>">
                        <?php }
                    ?>
                </div>
                
                <?php
                    if($hasSlider){ ?>
                        <div class="absolute right-2 top-0 h-3/5 grid place-items-center z-10">
                            <button class="next-image text-white font-bold text-xl"><i class="fa fa-chevron-right"></i></button>
                        </div>
                        <div class="image-counter absolute top-2 right-2 h-3/5 text-white font-bold text-lg"></div>
                    <?php }
                ?>
                <div class="p-4 h-2/5 flex flex-col justify-between overflow-hidden">
                    <h3 class="line-clamp-4"><?=$this->message?></h3>
                    <div class="text-orange-500 flex justify-between">
                        <div><?=$this->formateDate()?></div>
                        <button class="more-info underline" data-post-id="post-<?=$this->id?>">Voir plus</button>
                    </div>
                </div>
            </article>
        <?php 
        $card = ob_get_clean();

        return $card;
    }

    public function formateDate():string
    {
        $date = date_create_from_format("Y-m-d\TH:i:sO", $this->date);        
        $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
        $formattedDate = $formatter->format($date);
        
        return $formattedDate;

    }
}