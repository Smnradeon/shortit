#include<stdio.h>
#include<string.h>
//making string
struct string
{
char c[20];
};

//crypt array of char
char crypt[64] = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

//function to get position of a character in crypt[]
int getval(char c)
{
int v;

if(c>='A' && c<='Z')
	{ v = c-'A'; }
	else if( c>='a' && c<='z' )
		{v=c-'a';
		v=v+26;}
		else v = 52 + ( c - '0' );
return v;
}

//decoding algorithm
long long int decode(string s)
{
long long int n=0;
int i=0;
long long int mul=1;
	while(s.c[i]!='\0')
	{
    n = n + (mul * getval(s.c[i]));
	i++;
	mul=mul*62;
	}	

return n;
}


int main(int argc, char *argv[])
{
	string s;

//	scanf("%s",s.c);
	strcpy(s.c,argv[1]);
	printf("%lld",decode(s));
return 0;}

