<?php
namespace App\Http;

class Response
{
    private int $statusCode = 200;
    private string $protocolVersion = '1.1';
    private array $headers = [];
    private string $content = '';

    public function setStatusCode(int $statusCode): void
    {
        $this->statusCode = $statusCode;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setProtocolVersion(string $version): void
    {
        $this->protocolVersion = $version;
    }

    public function getProtocolVersion(): string
    {
        return $this->protocolVersion;
    }

    public function setHeader(string $name, string $value): void
    {
        $this->headers[$name] = $value;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getStatusText(): string
    {
        $statusTexts = [
            200 => 'OK',
            404 => 'Not Found',
            500 => 'Internal Server Error',
        ];

        return $statusTexts[$this->statusCode] ?? 'Unknown Status';
    }

    public function send(): void
    {
        $httpLine = sprintf(
            'HTTP/%s %s %s',
            $this->getProtocolVersion(),
            $this->getStatusCode(),
            $this->getStatusText()
        );

        if (!headers_sent()) {
            header($httpLine, true, $this->getStatusCode());

            foreach ($this->getHeaders() as $name => $value) {
                header("$name: $value", false);
            }
        }

        echo $this->getContent();
    }
}
