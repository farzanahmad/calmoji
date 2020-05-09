<?php

namespace Ahmad\Calmoji;

use Exception;
use Illuminate\Console\Command;

class CalmojiCommand extends Command
{

    const QUIT_EXP = ['exit', 'quit'];

    /**
     * @var string
     */
    protected $signature = 'calmoji';

    /**
     * @var string
     */
    protected $description = 'Emoji Calculator';

    /**
     * @var Calmoji
     */
    protected $calmoji;

    /**
     * @param  Calmoji  $calmoji
     */
    public function __construct(Calmoji $calmoji)
    {
        parent::__construct();
        $this->calmoji = $calmoji;
    }

    /**
     * @return void
     */
    public function handle(): void
    {
        $expression = '';
        while (!in_array($expression, self::QUIT_EXP)) {
            $expression = $this->ask('Expression (write ' . implode('/', self::QUIT_EXP) . ' to quit)');
            if (in_array($expression, self::QUIT_EXP)) {
                continue;
            }
            try {
                $result = $this->calmoji->evaluate($expression);
                $this->output->writeln($result);
            } catch (Exception $e) {
                $this->output->error('🤷‍ ' . $e->getMessage());
            }
        }
    }
}
