# Grid sortable for LaveroAdmin

Sort grid rows by dragging and dropping for LaveroAdmin.

Repository: [https://github.com/LaveroAdmin/grid-sortable](https://github.com/LaveroAdmin/grid-sortable)

## Installation

```bash
composer require laveroadmin/grid-sortable
```

## Usage

1. In your Eloquent Model, use `Spatie\EloquentSortable\SortableTrait`:

```php
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Item extends Model implements Sortable
{
    use SortableTrait;

    public $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => true,
    ];
}
```

2. Enable in your Grid:

```php
$grid = new Grid(new Item());

$grid->sortable();
```

After dragging rows, click the "Save order" button that appears at the top of the grid to persist the new order.

## License

Licensed under [The MIT License (MIT)](LICENSE).

## Thanks

- Special thanks to [open-admin](https://github.com/open-admin-org/open-admin) for open-admin development.
- Special thanks to [z-song](https://github.com/z-song) for original development.
