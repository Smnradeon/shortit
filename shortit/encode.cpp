#include<stdio.h>
#include<stdlib.h>

//making string
struct string
{
char c[20];
};

//crypt array of char
char crypt[64] = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

//encoding algorithm
string encode(long long int n)
{

	string s;
	int i=0;
	
	while(n>0)
	{
		
	s.c[i]=crypt[n%62];
	
	i++;
	n=n/62;
	
	}
s.c[i]='\0';
	
return s;
}

int main(int argc, char *argv[])
{
long long int n;

//scanf("%lld",&n);

n=atoll(argv[1]);

printf("%s",encode(n).c);

//getch();
return 0;
}


