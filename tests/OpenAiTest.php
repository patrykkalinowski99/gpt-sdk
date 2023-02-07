<?php

namespace Marlemiesz\GptSdk;

use PHPUnit\Framework\TestCase;

class OpenAiTest extends TestCase
{
    const envFile = __DIR__ . '/../.env.test';
    private OpenAi $openAi;
    
    private function validateEnv(): void
    {
        if(!file_exists(self::envFile)) {
            $this->markTestSkipped('No .env file found');
        }
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../', '.env.test');
        $dotenv->load();
        if(!isset($_ENV['GPT_TOKEN']) && $_ENV['GPT_TOKEN'] !== '') {
            $this->markTestSkipped('Please set GPT_TOKEN in your .env file');
        }
    }
    
    public function setUp(): void
    {
        parent::setUp();
        $this->validateEnv();
        $this->openAi = new OpenAi($_ENV['GPT_TOKEN']);
    }
    public function testGenerateImage()
    {
    
    }
}
